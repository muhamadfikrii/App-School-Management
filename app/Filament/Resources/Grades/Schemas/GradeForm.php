<?php

namespace App\Filament\Resources\Grades\Schemas;

use App\Enums\Semester;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\ClassRombel;
use App\Models\AcademicYear;
use App\Models\GradeComponent;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class GradeForm
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
                                ->options(AcademicYear::pluck('name','id')->toArray()),
                            Select::make('semester')
                                ->label('Semester')
                                ->options(Semester::toArray()),
                            Select::make('class_rombel_id')
                                ->label('Kelas')
                                ->options(ClassRombel::pluck('name','id'))
                                ->reactive() // agar perubahan kelas memicu update
                                ->searchable()
                                ->required()
                                ->default(function ($get, $livewire) {
                                    return $livewire->student?->classRombel->id;
                                })
                                ->afterStateUpdated(function ($state, callable $set) {
                                    // reset student_id saat ganti kelas
                                    $set('student_id', null);
                                }),
                            Select::make('student_id')
                                ->label('Nama Siswa')
                                ->options(function (callable $get) {
                                    $classId = $get('class_rombel_id'); // ambil kelas yang dipilih
                                    if (!$classId) return [];
                                    return Student::where('class_rombel_id', $classId)
                                                ->pluck('full_name','id');
                                })
                                ->searchable()
                                ->default(function ($get, $livewire) {
                                    return $livewire->student?->id; // id siswa otomatis dipilih
                                })
                                ->required(),
                            Select::make('subject_id')
                                ->label('Mata Pelajaran')
                                ->options(Subject::pluck('name','id'))
                                ->reactive() // biar perubahan memicu update guru
                                ->afterStateUpdated(fn ($state, callable $set) => $set('teacher_id', null)),

                            Select::make('teacher_id')
                                ->label('Guru Pengajar')
                                ->relationship('teacher', 'full_name')
                                ->options(function (callable $get) {
                                    $subjectId = $get('subject_id');
                                    return $subjectId
                                        ? Teacher::whereHas('subjects', fn($q) => $q->where('subjects.id', $subjectId))
                                                ->pluck('full_name','id') : [];
                                })
                                // ->searchable()
                                ->required(),
                            Select::make('grade_component_id')
                                ->label('Komponen Nilai')
                                ->searchable()
                                ->options(GradeComponent::pluck('name','id')->toArray()),
                            TextInput::make('score')
                                ->label('Nilai')
                                ->numeric()
                                ->required()
                        ])
                    ]),
            ]);
    }
}
