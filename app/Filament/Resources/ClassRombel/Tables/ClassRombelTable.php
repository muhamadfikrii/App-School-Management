<?php

namespace App\Filament\Resources\ClassRombel\Tables;

use function auth;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ClassRombelTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Kelas')
                    ->searchable(),
                TextColumn::make('teacher.full_name')
                    ->label('Wali Kelas')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Dibuat'),
                TextColumn::make('updated_at')
                    ->label('Diubah'),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $user = auth()->user();

                if ($user->is_teacher && $user->teacher) {
                    $query->whereHas('teacher', function ($q) use ($user): void {
                        $q->where('id', $user->teacher->id);
                    });

                    return $query;
                }
            })
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
            ]);
    }
}
