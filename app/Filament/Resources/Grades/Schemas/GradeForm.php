<?php

namespace App\Filament\Resources\Grades\Schemas;

use App\Enums\Semester;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\ClassRombel;
use App\Models\AcademicYear;
use App\Models\GradeComponents;
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


                            Select::make('class_rombel_id')
                                ->label('Kelas')
                                ->options(ClassRombel::pluck('name','id'))
                                ->default(fn () => auth()->user()?->teacher?->classes?->id)
                                ->reactive()
                                ->preload()
                                ->searchable()
                                ->required()
                                ->afterStateUpdated(fn ($state, callable $set) => $set('student_id', null)),

                            Select::make('student_id')
                                ->label('Nama Siswa')
                                ->options(Student::pluck('full_name','id'))
                                ->searchable()
                                ->required(),

                            Select::make('subject_id')
                                ->label('Mata Pelajaran')
                                ->options(Subject::pluck('name','id'))
                                ->reactive() // biar perubahan memicu update guru
                                ->afterStateUpdated(fn ($state, callable $set) => $set('teacher_id', null)),

                            Select::make('teacher_id')
                                ->label('Guru Pengajar')
                                ->options(function (callable $get) {
                                    $subjectId = $get('subject_id'); // mapel yg dipilih
                                    return $subjectId
                                        ? Teacher::whereHas('subjects', fn($q) => $q->where('subjects.id', $subjectId))
                                                ->pluck('full_name','id') : [];
                                })
                                ->searchable()
                                ->required(),

                            Select::make('academic_year_id')
                                ->label('Tahun Akademik')
                                ->options(AcademicYear::pluck('name','id')->toArray()),


                            Select::make('semester')
                                ->label('Semester')
                                ->options(Semester::toArray()),

                            Select::make('grades_components_id')
                                ->label('Assesments')
                                ->searchable()
                                ->options(GradeComponents::pluck('name','id')->toArray()),

                            TextInput::make('score')
                                ->label('Nilai')
                                ->required()
                        ])


                            ]),
                        ]);
    }
}
