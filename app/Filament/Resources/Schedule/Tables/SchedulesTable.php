<?php

namespace App\Filament\Resources\Schedule\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\ExportAction;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Exports\SchedulesExporter;

class SchedulesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('day')
                    ->searchable()
                    ->label('Hari'),
                TextColumn::make('scheduleSubjects.time_start')
                    ->searchable()
                    ->label('Jam Mulai'),
                TextColumn::make('scheduleSubjects.time_end')
                    ->searchable()
                    ->label('Jam Selesai'),
                TextColumn::make('scheduleSubjects.subject.name')
                    ->searchable()
                    ->label('Mata Pelajaran'),
                TextColumn::make('scheduleSubjects.teacher.full_name')
                    ->searchable()
                    ->label('Guru'),

            ])
            ->defaultGroup('classRombel.name')
            ->filters([
                //
            ])

            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->headerActions([
                ExportAction::make()
                ->exporter(SchedulesExporter::class)
                ->fileName('jadwal-mengajar')

            ]);
        }
}
