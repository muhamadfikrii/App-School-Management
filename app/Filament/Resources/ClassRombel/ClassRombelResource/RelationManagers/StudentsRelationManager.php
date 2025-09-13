<?php

namespace App\Filament\Resources\ClassRombel\ClassRombelResource\RelationManagers;

use Filament\Tables\Table;
use Filament\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\Students\StudentsResource;
use Filament\Resources\RelationManagers\RelationManager;

class StudentsRelationManager extends RelationManager
{
    protected static string $relationship = 'student';

    protected static ?string $relatedResource = StudentsResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("full_name")
                    ->label("Nama Siswa"),
                TextColumn::make("nisn")
                    ->label("NISN"),
                TextColumn::make("date_of_birth")
                    ->label("Tanggal Lahir"),
                TextColumn::make("gender")
                    ->label("Jenis Kelamin"),
                    ])
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
