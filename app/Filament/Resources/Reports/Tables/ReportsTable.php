<?php

namespace App\Filament\Resources\Reports\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class ReportsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.nisn')
                    ->searchable()
                    ->label('NISN'),
                TextColumn::make('student.full_name')
                    ->searchable()
                    ->label('Nama Lengkap'),
                TextColumn::make('academicYear.name')
                    ->searchable()
                    ->label('Tahun Akademik'),
                TextColumn::make('semester')
                    ->searchable()
                    ->label('Semester'),
                TextColumn::make('created_at')
                    ->label('dibuat')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('diubah')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultGroup('classRombel.name')
            ->filters([
                //
            ])
            ->recordActions([
                // ViewAction::make(),
                // EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
