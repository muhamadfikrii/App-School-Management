<?php

namespace App\Filament\Resources\Teachers\Tables;

use App\Filament\Resources\Teachers\TeacherResource;
use App\Models\Teacher;

use function auth;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TeachersTable
{
    public static function configure(Table $table): Table
    {
        $user = auth()->user();

        return $table
            ->columns([
                TextColumn::make('nip')
                    ->label('NIP')
                    ->searchable(),

                TextColumn::make('full_name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('date_of_birth')
                    ->label('Tanggal Lahir')
                    ->date('d M Y')
                    ->visible(fn ($record) => $user->is_admin || ($user->is_teacher && $user->teacher?->id === $record?->id)),

                TextColumn::make('phone')
                    ->label('Nomor Telepon')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->visible(fn ($record) => $user->is_admin || ($user->is_teacher && $user->teacher?->id === $record?->id)),

                TextColumn::make('gender')
                    ->label('Jenis Kelamin'),
            ])
            ->filters([
                SelectFilter::make('full_name')
                    ->label('Nama')
                    ->multiple()
                    ->searchable()
                    ->options(Teacher::pluck('full_name', 'full_name')->toArray()),

                SelectFilter::make('nip')
                    ->label('NIP')
                    ->multiple()
                    ->searchable()
                    ->options(Teacher::pluck('nip', 'nip')->toArray()),
            ])
            ->paginated([10, 25, 50, 'all'])
            ->recordUrl(fn (Teacher $record): string => match (true) {
                $user->is_admin                                                           => TeacherResource::getUrl('view', ['record' => $record]),
                $user->is_teacher && $user->teacher && $user->teacher->id === $record->id => TeacherResource::getUrl('edit', ['record' => $record]),
                default                                                                   => TeacherResource::getUrl('view', ['record' => $record]),
            })
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('full_name', 'asc')
            ->striped();
    }
}
