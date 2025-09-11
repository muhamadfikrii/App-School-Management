<?php

namespace App\Filament\Resources\Schedule\Schemas;

use App\Enums\Days;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\ClassRombel;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TimePicker;

class ScheduleForm
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
                                    ->columnSpan(1),

                                Select::make('class_rombel_id')
                                    ->label('Kelas')
                                    ->searchable()
                                    ->required()
                                    ->options(fn () => ClassRombel::pluck('name', 'id')->toArray())
                                    ->columnSpan(1),
                            ]),

                        Repeater::make('scheduleSubjects')
                            ->label('Mata Pelajaran')
                            ->relationship('scheduleSubjects')
                            ->schema([
                                Select::make('subject_id')
                                    ->label('Mata Pelajaran')
                                    ->required()
                                    ->searchable()
                                    ->options(fn () => Subject::pluck('name', 'id')->toArray()),

                                TimePicker::make('time_start')
                                    ->label('Mulai')
                                    ->displayFormat('H:i')
                                    ->required(),

                                TimePicker::make('time_end')
                                    ->label('Selesai')
                                    ->displayFormat('H:i')
                                    ->required(),

                                Select::make('teacher_id')
                                    ->label('Guru Pengajar')
                                    ->searchable()
                                    ->options(function (callable $get) {
                                        $subjectId = $get('subject_id');
                                        if (!$subjectId) return [];

                                        return Teacher::whereHas('subjects', fn($q) => $q->where('subjects.id', $subjectId))
                                            ->pluck('full_name', 'id')
                                            ->toArray();
                                    })
                                    ->required(),
                            ])
                            ->columnSpanFull()
                            ->minItems(1)
                            ->createItemButtonLabel('Tambah Mata Pelajaran'),
                    ]),
            ]);
    }
}
