<?php

namespace App\Filament\Resources\Reports\Schemas;

use App\Enums\Semester;
use App\Enums\Status;
use App\Models\AcademicYear;
use App\Models\ClassRombel;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class ReportForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('')
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('academic_year_id')
                                    ->label('Tahun Akademik')
                                    ->options(AcademicYear::pluck('name','id')->toArray())
                                    ->reactive()
                                    ->required()
                                    ->afterStateUpdated(fn ($state, Set $set, Get $get) => self::updateRepeaterScores($get, $set)),

                                Select::make('semester')
                                    ->label('Semester')
                                    ->options(Semester::toArray())
                                    ->reactive()
                                    ->required()
                                    ->afterStateUpdated(fn ($state, Set $set, Get $get) => self::updateRepeaterScores($get, $set)),

                                Select::make('class_rombel_id')
                                    ->label('Kelas')
                                    ->options(function () {
                                        $user = auth()->user();

                                        if ($user->is_admin) {
                                            return ClassRombel::pluck('name', 'id')->toArray();
                                        }

                                        if ($user->is_teacher && $user->teacher) {
                                            return ClassRombel::forTeacher($user->teacher->id)
                                                ->pluck('name', 'id')
                                                ->toArray();
                                        }

                                        return [];
                                    })
                                    ->default(function () {
                                        $user = auth()->user();
                                        if ($user->is_teacher && $user->teacher && $user->teacher->classRombel) {
                                            return $user->teacher->classRombel->id;
                                        }

                                        return null;
                                    })
                                    ->reactive()
                                    ->preload()
                                    ->required()
                                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                        $set('student_id', null);

                                        $nilaiSiswa = $get('nilai-siswa') ?? [];
                                        foreach ($nilaiSiswa as $index => $item) {
                                            $set("nilai-siswa.$index.final_score", null);
                                            $set("nilai-siswa.$index.predicate", null);
                                            $set("nilai-siswa.$index.is_passed", null);
                                        }

                                        $students = Student::where('class_rombel_id', $state)
                                            ->where('status', Status::ACTIVE->value)
                                            ->pluck('full_name','id')
                                            ->toArray();

                                        $set('student_options', $students);
                                    }),


                                Select::make('student_id')
                                    ->label('Nama Siswa')
                                    ->options(fn (Get $get) => $get('student_options') ?? [])
                                    ->reactive()
                                    ->preload()
                                    ->searchable()
                                    ->required()
                                    ->default(function ($get, $livewire) {
                                        return $livewire->student?->id;
                                    })
                                    ->afterStateHydrated(function ($state, Set $set, Get $get) {
                                        $classId = $get('class_rombel_id');
                                        if ($classId && empty($get('student_options'))) {
                                            $students = Student::where('class_rombel_id', $classId)
                                                ->pluck('full_name','id')
                                                ->toArray();
                                            $set('student_options', $students);
                                        }
                                    })
                                    ->afterStateUpdated(fn ($state, Set $set, Get $get) => self::updateRepeaterScores($get, $set)),
                            ]),
                    ]),

                Repeater::make('nilai-siswa')
                    ->label('Mata Pelajaran')
                    ->relationship('gradesDetail')
                    ->columnSpanFull()
                    ->schema([
                        Select::make('subject_id')
                            ->label('Mata Pelajaran')
                            ->required()
                            ->options(function (Get $get) {
                                $selected = collect($get('nilai-siswa') ?? [])
                                    ->pluck('subject_id')
                                    ->filter()
                                    ->toArray();

                                return Subject::whereNotIn('id', $selected)->pluck('name', 'id');
                            })
                            ->reactive()
                            ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                $studentId = $get('../../student_id');
                                $academicYearId = $get('../../academic_year_id');
                                $semester = $get('../../semester');

                                if ($state && $studentId && $academicYearId && $semester) {
                                    $subject = Subject::find($state);
                                    $set('kkm', $subject->kkm);
                                    $result = $subject->calculate($studentId, $academicYearId, $semester);
                                    $set('final_score', round($result['final_score']));
                                    $set('predicate', $result['predicate']);
                                    $set('is_passed', $result['is_passed'] ? 'Lulus' : 'Remedial');
                                } else {
                                    $set('kkm', null);
                                    $set('final_score', null);
                                    $set('predicate', null);
                                    $set('is_passed', null);
                                }
                            })
                            ->disabled(function (Get $get) {
                                return !$get('../../student_id') || !$get('../../academic_year_id') || !$get('../../semester');
                            })
                            ->disableOptionsWhenSelectedInSiblingRepeaterItems(),

                        Grid::make(4)
                            ->schema([
                                TextInput::make('kkm')
                                    ->disabled()
                                    ->dehydrated()
                                    ->label('KKM'),

                                TextInput::make('final_score')
                                    ->disabled()
                                    ->dehydrated()
                                    ->label('Nilai'),

                                TextInput::make('predicate')
                                    ->disabled()
                                    ->dehydrated()
                                    ->label('Predikat'),

                                TextInput::make('is_passed')
                                    ->disabled()
                                    ->dehydrated()
                                    ->label('Keterangan'),
                            ])
                    ])
                    ->columns(2),

                        TextInput::make('avrg')
                            ->label('Rata-Rata')
                            ->disabled()
                            ->reactive()
                            ->dehydrated(false)
                            ->afterStateHydrated(function ($state, Set $set, Get $get) {
                                $nilaiSiswa = $get('nilai-siswa') ?? [];
                                $scores = array_filter(array_column($nilaiSiswa, 'final_score'));
                                $avg = $scores ? array_sum($scores) / count($scores) : null;
                                $set('avrg', $avg ? round($avg, 2) : 0);
                            })
                            ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                // kalau mau update otomatis setiap kali repeater berubah
                                $nilaiSiswa = $get('nilai-siswa') ?? [];
                                $scores = array_filter(array_column($nilaiSiswa, 'final_score'));
                                $avg = $scores ? array_sum($scores) / count($scores) : null;
                                $set('avrg', $avg ? round($avg, 2) : 0);
                            })
            ]);
    }

    protected static function updateRepeaterScores(Get $get, Set $set)
    {
        $studentId = $get('student_id');
        $academicYearId = $get('academic_year_id');
        $semester = $get('semester');
        $nilaiSiswa = $get('nilai-siswa') ?? [];

        foreach ($nilaiSiswa as $index => $item) {
            $subjectId = $item['subject_id'] ?? null;
            if ($subjectId && $studentId && $academicYearId && $semester) {
                $subject = Subject::find($subjectId);
                $result = $subject->calculate($studentId, $academicYearId, $semester);
                $set("nilai-siswa.$index.final_score", round($result['final_score']));
                $set("nilai-siswa.$index.predicate", $result['predicate']);
                $set("nilai-siswa.$index.is_passed", $result['is_passed'] ? 'Lulus' : 'Remedial');
            } else {
                $set("nilai-siswa.$index.final_score", null);
                $set("nilai-siswa.$index.predicate", null);
                $set("nilai-siswa.$index.is_passed", null);
            }
        }
    }
}
