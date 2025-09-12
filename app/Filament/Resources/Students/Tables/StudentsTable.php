<?php

namespace App\Filament\Resources\Students\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;

class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->searchable()
                    ->label('Nama Lengkap'),
                TextColumn::make('nisn')
                    ->searchable()
                    ->label('NISN'),
                TextColumn::make('date_of_birth')
                    ->date(' d M Y')
                    ->searchable()
                    ->label('Tanggal Lahir'),
                TextColumn::make('gender')
                    ->searchable(),
                TextColumn::make('classRombel.name')
                    ->label('Kelas')
                    ->searchable(),
            ])
            ->filters([

            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])->modifyQueryUsing(function (Builder $query) {
                $query->with('classRombel');
                $user = auth()->user();
                if ($user->is_teacher && $user->teacher) {
                    $query->whereHas('classRombel', function ($q) use ($user) {
                        $q->where('teacher_id', $user->teacher->id);
                    });
                    return $query;
                }
            });
    }
}
