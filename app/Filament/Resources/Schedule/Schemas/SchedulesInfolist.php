<?php

namespace App\Filament\Resources\Schedule\Schemas;

use App\Enums\Days;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;

class ScheduleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make("Detail Jadwal")
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('day')
                                    ->label('Hari')
                                    ->formatStateUsing(fn ($state) => Days::toArray()[$state] ?? $state),

                                TextEntry::make('classRombel.name')
                                    ->label('Kelas'),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextEntry::make('time_start')
                                    ->label('Mulai')
                                    ->dateTime('H:i'),

                                TextEntry::make('time_end')
                                    ->label('Selesai')
                                    ->dateTime('H:i'),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextEntry::make('subject.name')
                                    ->label('Mata Pelajaran'),

                                TextEntry::make('teacher.full_name')
                                    ->label('Guru Pengajar'),
                            ]),
                    ]),
            ]);
    }
}
