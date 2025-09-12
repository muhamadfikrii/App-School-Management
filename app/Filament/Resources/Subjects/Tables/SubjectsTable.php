<?php

namespace App\Filament\Resources\Subjects\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Grouping\Group;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class SubjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns(components: [
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->searchable(),
                
                TextColumn::make('name')
                    ->searchable()
                    ->label('Mata Pelajaran'),

                TextColumn::make('teachers.full_name')
                    ->label('Guru Pengajar')
                    ->searchable(),

                TextColumn::make('code')
                    ->searchable()
                    ->label('Code'),
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
                    DeleteBulkAction::make(),
                ]),
            ])
            ->groups([
                Group::make('category.name')
                    ->label('Kategori'),
            ])
            ->defaultGroup('category.name');
    }
}
