<?php

namespace App\Filament\Resources\Students\RelationManagers;

use App\Filament\Resources\Reports\ReportResource;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FinalGradeRelationManager extends RelationManager
{
    protected static string $relationship = 'finalGrade';

    protected static ?string $title = 'Nilai Akhir Semeseter';

    public function table(Table $table): Table
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
                TextColumn::make('gradesDetail.is_passed')
                    ->searchable()
                    ->label('Predicat'),
                TextColumn::make('created_at')
                    ->label('dibuat')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('diubah')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->headerActions([
                CreateAction::make()
                    ->url(fn () => ReportResource::getUrl('create', [
                        'student' => $this->getOwnerRecord()->id,
                    ]))
                    ->label('Input Nilai Akhir Semeseter'),
            ])
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
