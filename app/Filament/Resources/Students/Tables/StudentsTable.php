<?php

namespace App\Filament\Resources\Students\Tables;

use App\Enums\Status;
use App\Models\Student;
use Filament\Tables\Table;
use App\Models\ClassRombel;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Students\StudentsResource;

class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nisn')
                    ->searchable()
                    ->label('NISN'),
                TextColumn::make('full_name')
                    ->searchable()
                    ->label('Nama Lengkap'),
                TextColumn::make('date_of_birth')
                    ->date(' d M Y')
                    ->searchable()
                    ->label('Tanggal Lahir')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('gender')
                    ->searchable(),
                TextColumn::make('classRombel.name')
                    ->label('Kelas')
                    ->searchable(),
                TextColumn::make('year_enrollment')
                    ->label('Tahun Masuk')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Diubah')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('full_name')
                    ->label('Nama')
                    ->multiple()
                    ->searchable()
                    ->options(
                    Student::pluck('full_name', 'full_name')
                        ->toArray()),
                SelectFilter::make('nisn')
                    ->label('NISN')
                    ->searchable()
                    ->multiple()
                    ->options(
                    Student::pluck('nisn', 'nisn')
                        ->toArray()
        ),
                SelectFilter::make('class_rombel_id')
                    ->label('Kelas')
                    ->searchable()
                    ->options(
                    ClassRombel::pluck('name', 'id')
                        ->toArray()
        ),
                SelectFilter::make('status')
                    ->label('Status')
                    ->searchable()
                    ->options(Status::toArray()),
            ])
            ->defaultPaginationPageOption(25)
            ->recordUrl(
                fn (Student $record): string => StudentsResource::getUrl('edit', ['record' => $record])
            )
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
            })
            ->striped();
    }
}
