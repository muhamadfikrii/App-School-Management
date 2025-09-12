<?php

namespace App\Filament\Resources\Schedule\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\RepeatableEntry;

class ScheduleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Detail Jadwal')
                    ->columnSpanFull()
                    ->schema([
                       Grid::make(2)
                            ->schema([
                                TextEntry::make('day')
                                    ->label('Hari'),

                                TextEntry::make('classRombel.name')
                                    ->label('Kelas'),
                            ]),

                        RepeatableEntry::make('scheduleSubjects')
                            ->label('Mata Pelajaran')
                            ->schema([
                                Grid::make(4)
                                    ->schema([
                                        TextEntry::make('subject.name')
                                            ->label('Mata Pelajaran'),

                                        TextEntry::make('teacher.full_name')
                                            ->label('Guru'),

                                        TextEntry::make('time_start')
                                            ->label('Mulai')
                                            ->dateTime('H:i'),

                                        TextEntry::make('time_end')
                                            ->label('Selesai')
                                            ->dateTime('H:i'),
                                    ]),
                            ])
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
