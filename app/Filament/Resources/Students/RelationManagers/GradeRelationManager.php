<?php

namespace App\Filament\Resources\Students\RelationManagers;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\Grades\GradeResource;
use Filament\Resources\RelationManagers\RelationManager;

class GradeRelationManager extends RelationManager
{
    protected static string $relationship = 'grade';

    protected static ?string $title = 'Nilai Siswa';

    protected static ?string $relatedResource = GradeResource::class;

    public function table(Table $table): Table
    {
        return $table
                ->columns([
                TextColumn::make("teacher.full_name")
                    ->label("Guru Pengajar"),
                TextColumn::make("subject.name")
                    ->label("Mata Pelajaran"),
                TextColumn::make("gradeComponents.name")
                    ->label("Mata Pelajaran"),
                TextColumn::make("score")
                    ->label("Nilai"),
                    ])
            ->headerActions([
                CreateAction::make(),
            ]);
    }

    
}
