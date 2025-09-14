<?php

namespace App\Filament\Resources\Teachers\Tables;

use App\Models\Teacher;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\Teachers\TeacherResource;

class TeachersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->searchable()
                    ->sortable()
                    ->label('Nama'),
                TextColumn::make('nip')
                    ->searchable()
                    ->label('NIP'),
                TextColumn::make('date_of_birth')
                    ->searchable()
                    ->date('d M Y')
                    ->label('Tanggal Lahir'),
                TextColumn::make('phone')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('gender')
                    ->label('Jenis Kelamin')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                SelectFilter::make('full_name')
                    ->label('Nama')
                    ->multiple()
                    ->searchable()
                    ->options(
                    Teacher::pluck('full_name', 'full_name')
                        ->toArray()),
                SelectFilter::make('nip')
                    ->label('NIP')
                    ->multiple()
                    ->searchable()
                    ->options(
                    Teacher::pluck('nip', 'nip')
                        ->toArray()),
            ])
            ->paginated([10, 25, 50, 'all'])
            ->recordUrl(
                fn (Teacher $record): string => TeacherResource::getUrl('edit', ['record' => $record])
            )
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('full_name', 'asc')
            ->striped();
    }
}
