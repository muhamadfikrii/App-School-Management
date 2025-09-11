<?php

namespace App\Filament\Resources\Schedules\Schemas;

use App\Enums\Days;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Schedules;
use App\Models\ClassRombel;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Utilities\Get;

class SchedulesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make("Jadwal Mengajar")
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('day')
                                    ->label('Hari')
                                    ->options(Days::toArray())
                                    ->required()
                                    ->rule(function (Get $get, $context = null) {

                                        if ($context === 'edit') {
                                            return []; // kosongkan rule saat edit
                                        }
                                        
                                        $classId = $get('class_rombel_id');

                                        return function ($attribute, $value, $fail) use ($classId) {
                                            if (Schedules::where('class_rombel_id', $classId)
                                                        ->where('day', $value)
                                                        ->exists()) {
                                                $fail("Hari {$value} untuk kelas ini sudah ada.");
                                            }
                                        };
                                    })
                                    ->columnSpan(1),

                                Select::make('class_rombel_id')
                                    ->label('Kelas')
                                    ->searchable()
                                    ->required()
                                    ->options(function () {
                                        return ClassRombel::all()
                                            ->mapWithKeys(fn($classRombel) => [
                                                $classRombel->id => $classRombel->name,
                                            ])
                                            ->toArray();
                                    })
                                    ->columnSpan(1),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TimePicker::make('time_start')
                                    ->label('Mulai')
                                    ->placeholder('Contoh: 07:00 Wib')
                                    ->displayFormat('H:i')
                                    ->required()
                                    ->columnSpan(1),

                                TimePicker::make('time_end')
                                    ->label('Selesai')
                                    ->placeholder('Contoh: 09:15 Wib')
                                    ->displayFormat('H:i')
                                    ->required()
                                    ->columnSpan(1),
                            ]),

                        Grid::make(2)
                            ->schema([
                                Select::make('subject_id')
                                    ->label('Mata Pelajaran')
                                    ->searchable()
                                    ->required()
                                    ->reactive()
                                    ->options(function () {
                                        return Subject::all()
                                            ->mapWithKeys(fn($subject) => [
                                                $subject->id => $subject->name,
                                            ])
                                            ->toArray();
                                    })
                                    ->columnSpan(1),

                                Select::make('teacher_id')
                                    ->label('Guru Pengajar')
                                    ->searchable()
                                    ->options(function (callable $get) {
                                        $subjectId = $get('subject_id');
                                        if (!$subjectId) return [];

                                        return Teacher::whereHas('subjects', fn($q) => $q->where('subjects.id', $subjectId))
                                            ->with('user')
                                            ->get()
                                            ->mapWithKeys(fn($teacher) => [
                                                $teacher->id => $teacher->full_name,
                                            ])->toArray();
    })

                            ]),
                    ]),
            ]);
    }
}
