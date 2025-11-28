<?php

namespace App\Filament\Resources\Grades\Schemas;

use App\Enums\Semester;
use App\Enums\Status;
use App\Models\AcademicYear;
use App\Models\ClassRombel;
use App\Models\GradeComponent;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;

use function auth;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

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
                                    ->required()
                                    ->options(AcademicYear::pluck('name', 'id')->toArray()),
                                Select::make('semester')
                                    ->label('Semester')
                                    ->required()
                                    ->options(Semester::toArray()),
                                Select::make('class_rombel_id')
                                    ->label('Kelas')
                                    ->options(ClassRombel::pluck('name', 'id'))
                                    ->reactive()
                                    ->searchable()
                                    ->required()
                                    ->default(function ($get, $livewire) {
                                        return $livewire->student?->classRombel->id;
                                    })
                                    ->afterStateUpdated(function ($state, callable $set): void {
                                        $set('student_id', null);
                                    }),
                                Select::make('student_id')
                                    ->label('Nama Siswa')
                                    ->options(function (callable $get) {
                                        $classId = $get('class_rombel_id');
                                        if (!$classId) {
                                            return [];
                                        }

                                        return Student::where('class_rombel_id', $classId)
                                            ->where('status', Status::ACTIVE->value)
                                            ->pluck('full_name', 'id');
                                    })
                                    ->searchable()
                                    ->default(function ($get, $livewire) {
                                        return $livewire->student?->id;
                                    })
                                    ->required(),
                                Select::make('subject_id')
                                    ->label('Mata Pelajaran')
                                    ->options(function () {
                                        $user = auth()->user();
                                        if ($user->is_teacher && $user->teacher) {
                                            return $user->teacher->subjects->pluck('name', 'id')->toArray();
                                        }

                                        return Subject::pluck('name', 'id')->toArray();
                                    })
                                    ->reactive()
                                    ->required()
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('teacher_id', null)),

                                Select::make('teacher_id')
                                    ->label('Guru Pengajar')
                                    ->relationship('teacher', 'full_name')
                                    ->options(function (callable $get) {
                                        $subjectId = $get('subject_id');

                                        return $subjectId
                                            ? Teacher::whereHas('subjects', fn ($q) => $q->where('subjects.id', $subjectId))
                                                ->pluck('full_name', 'id') : [];
                                    })
                                    ->required(),
                                Select::make('grade_component_id')
                                    ->label('Komponen Nilai')
                                    ->searchable()
                                    ->required()
                                    ->options(GradeComponent::pluck('name', 'id')->toArray()),
                                TextInput::make('score')
                                    ->label('Nilai')
                                    ->numeric()
                                    ->required()
                                    ->minValue(0)
                                    ->maxValue(100),
                            ]),
                    ]),
            ]);
    }
}
