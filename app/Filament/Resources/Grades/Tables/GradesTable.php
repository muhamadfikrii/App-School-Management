<?php

namespace App\Filament\Resources\Grades\Tables;

use App\Filament\Exports\SchedulesExporter;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\ExportAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class GradesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("student.full_name")
                    ->label("Nama Siswa"),
                TextColumn::make("classRombel.name")
                    ->label("Kelas"),
                TextColumn::make("gradeComponents.name")
                    ->label("Assesment"),
                TextColumn::make("subject.name")
                    ->label("Mata Pelajaran"),
                TextColumn::make("score")
                    ->label("Nilai"),
                
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                    ->visible(fn() => auth()->user()->hasRole('administrator')),
                ]),
            ]);
            
    }
}
