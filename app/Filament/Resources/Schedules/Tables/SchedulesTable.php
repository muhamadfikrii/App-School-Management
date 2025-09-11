<?php

namespace App\Filament\Resources\Schedules\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\ExportAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
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
                TextColumn::make('classRombel.name')
                ->searchable()
                ->label('Kelas'),
                TextColumn::make('subject.name')
                ->searchable()
                ->label('Mata Pelajaran'),
                TextColumn::make('teacher.full_name')
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
