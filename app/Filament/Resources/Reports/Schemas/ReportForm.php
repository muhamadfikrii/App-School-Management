<?php

namespace App\Filament\Resources\Reports\Schemas;

use App\Models\Grade;
use App\Enums\Semester;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\ClassRombel;
use App\Models\AcademicYear;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

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
                                    ->options(ClassRombel::pluck('name','id'))
                                    ->default(fn () => auth()->user()?->teacher?->classes?->id)
                                    ->reactive()
                                    ->preload()
                                    ->required()
                                    ->default(function ($get, $livewire) {
                                        return $livewire->student?->classRombel->id;
                                    })
                                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                        // Reset student_id dan repeater nilai
                                        $set('student_id', null);

                                        $nilaiSiswa = $get('nilai-siswa') ?? [];
                                        foreach ($nilaiSiswa as $index => $item) {
                                            $set("nilai-siswa.$index.final_score", null);
                                            $set("nilai-siswa.$index.predicate", null);
                                        }

                                        // Update daftar siswa sesuai kelas
                                        $students = Student::where('class_rombel_id', $state)
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
                                        return $livewire->student?->id; // id siswa otomatis dipilih
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
                                    ->afterStateUpdated(fn ($state, Set $set, Get $get) => ReportForm::updateRepeaterScores($get, $set)),
                            ]),
                    ]),

                Repeater::make('nilai-siswa')
                    ->relationship('gradesDetail')
                    ->columnSpanFull()
                    ->schema([
                        Select::make('subject_id')
                            ->label('Mata Pelajaran')
                            ->options(Subject::pluck('name','id'))
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
                                } else {
                                    $set('kkm', null);
                                    $set('final_score', null);
                                    $set('predicate', null);
                                }
                            }),

                        Grid::make(3)
                            ->schema([
                                TextInput::make('kkm')
                                    ->disabled()
                                    ->dehydrated(false)
                                    ->afterStateHydrated(function ($state, Set $set, Get $get) {
                                        $subjectId = $get('subject_id');
                                        if ($subjectId) {
                                            $set('kkm', Subject::find($subjectId)->kkm);
                                        }
                                    })
                                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                        $subjectId = $get('subject_id');
                                        if ($subjectId) {
                                            $set('kkm', Subject::find($subjectId)->kkm);
                                        }
                                    })
                                    ->label('KKM'),

                                TextInput::make('final_score')
                                    ->disabled()
                                    ->dehydrated()
                                    ->label('Nilai'),

                                TextInput::make('predicate')
                                    ->disabled()
                                    ->dehydrated()
                                    ->label('Predikat'),
                            ])
                    ])
                    ->columns(2),
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
            } else {
                $set("nilai-siswa.$index.final_score", null);
                $set("nilai-siswa.$index.predicate", null);
            }
        }
    }
}
