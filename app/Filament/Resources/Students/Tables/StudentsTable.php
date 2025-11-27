<?php

namespace App\Filament\Resources\Students\Tables;

use App\Enums\Status;
use App\Filament\Resources\Students\StudentsResource;
use App\Models\ClassRombel;
use App\Models\Student;

use function auth;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group as GroupingGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

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
                TextColumn::make('classRombel.teacher.full_name')
                    ->label('Wali kelas')
                    ->searchable(),
                TextColumn::make('year_enrollment')
                    ->label('Tahun Masuk')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge(fn ($record) => Status::from($record->status)->label())
                    ->colors([
                        'success' => Status::ACTIVE->value,
                        'primary' => Status::GRADUATED->value,
                        'warning' => Status::RELOCATED->value,
                    ])
                    ->searchable(),
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
                SelectFilter::make('id')
                    ->label('Nama')
                    ->multiple()
                    ->searchable()
                    ->options(Student::pluck('full_name', 'id'))
                    ->query(function (Builder $query, array $data): void {
                        if (!empty($data['values'])) {
                            $query->whereIn('id', $data['values']);
                        }
                    }),
                SelectFilter::make('nisn')
                    ->label('NISN')
                    ->multiple()
                    ->searchable()
                    ->options(Student::pluck('nisn', 'id'))
                    ->query(function (Builder $query, array $data): void {
                        if (!empty($data['values'])) {
                            $query->whereIn('id', $data['values']);
                        }
                    }),
                SelectFilter::make('class_rombel_id')
                    ->label('Kelas')
                    ->multiple()
                    ->searchable()
                    ->options(ClassRombel::pluck('name', 'id')->toArray())
                    ->query(function (Builder $query, array $data): void {
                        if (!empty($data['values'])) {
                            $query->whereIn('class_rombel_id', $data['values']);
                        }
                    }),
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
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $query->with(['classRombel.teacher']);
                $user = auth()->user();
                if ($user->is_teacher && $user->teacher) {
                    $query->whereHas('classRombel', function ($q) use ($user): void {
                        $q->where('teacher_id', $user->teacher->id);
                    });

                    return $query;
                }
            })
            ->defaultSort(function (Builder $query): Builder {
                return $query->orderBy('full_name');
            })
            ->groups([
                GroupingGroup::make('classRombel.name')
                    ->label('Kelas')
                    ->collapsible()
                    ->titlePrefixedWithLabel(false),

                GroupingGroup::make('status')
                    ->label('Status')
                    ->getTitleFromRecordUsing(
                        fn (Student $record) => $record->status
                        ? Status::from($record->status)->label()
                        : '-'
                    )
                    ->collapsible()
                    ->titlePrefixedWithLabel(false),

                GroupingGroup::make('year_enrollment')
                    ->label('Tahun Masuk')
                    ->collapsible()
                    ->titlePrefixedWithLabel(false),
            ])
            ->defaultGroup('classRombel.name')
            ->striped();
    }
}
