<?php

namespace App\Filament\Resources\Students\RelationManagers;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\Grades\GradeResource;
use App\Filament\Resources\Reports\ReportResource;
use Filament\Resources\RelationManagers\RelationManager;

class GradeRelationManager extends RelationManager
{
    protected static string $relationship = 'grade';

    protected static ?string $title = 'Nilai Sementara';

    public function table(Table $table): Table
    {
        return $table
                ->columns([
                    TextColumn::make("teacher.full_name")
                        ->label("Guru Pengajar"),
                    TextColumn::make("subject.name")
                        ->label("Mata Pelajaran"),
                    TextColumn::make("gradeComponent.name")
                        ->label("Kategori"),
                    TextColumn::make("score")
                        ->label("Nilai"),
                ])
            ->headerActions([
                CreateAction::make()
                    ->url(fn () => GradeResource::getUrl('create', [
                        'student' => $this->getOwnerRecord()->id,
                    ]))
                    ->label('Input Nilai'),
            ]);
    }
}
