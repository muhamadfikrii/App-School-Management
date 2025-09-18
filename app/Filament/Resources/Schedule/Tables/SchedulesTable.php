<?php

namespace App\Filament\Resources\Schedule\Tables;

use App\Enums\Days;
use App\Models\Teacher;
use Filament\Tables\Table;
use App\Models\ClassRombel;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ExportAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\SchedulesExporter;

class SchedulesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    TextColumn::make('day')
                        ->searchable()
                        ->label('Hari')
                        ->weight(FontWeight::Bold),
                    TextColumn::make('jadwal')
                        ->label('Jadwal')
                        ->getStateUsing(fn ($record) =>
                            $record->scheduleSubjects->map->display->implode('<br>')
                        )
                        ->html(),
                ])
            ])
            ->contentGrid([
                'md' => 1,
                'xl' => 2,
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $query->with([
                    'classRombel',
                    'scheduleSubjects.subject',
                    'scheduleSubjects.teacher',
                ]);
            })
            ->defaultGroup('classRombel.name')
            ->filters([
                SelectFilter::make('class_rombel_id')
                    ->label('Kelas')
                    ->multiple()
                    ->searchable()
                    ->options(ClassRombel::pluck('name', 'id')->toArray())
                    ->query(function (Builder $query, array $data) {
                        if (! empty($data['values'])) {
                            $query->whereIn('class_rombel_id', $data['values']);
                        }
                    }),
                SelectFilter::make('teacher_id')
                    ->label('Guru')
                    ->searchable()
                    ->options(Teacher::pluck('full_name', 'id')->toArray())
                    ->query(function (Builder $query, array $data) {
                    
                        if (! empty($data['values'])) {
                            $query->whereHas('scheduleSubjects', function ($q) use ($data){
                                $q->whereIn('teacher_id', $data['values']);
                        });
                    }
                }),
                SelectFilter::make('day')
                    ->label('Hari')
                    ->options(Days::toArray())
                    ->searchable(),
            ])
            ->recordActions([
                DeleteAction::make(),
                EditAction::make(),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(SchedulesExporter::class)
                    ->fileName('jadwal-mengajar')
            ])->modifyQueryUsing(function (Builder $query) {
                    $query->with([
                        'classRombel',
                        'scheduleSubjects' => function ($q) {
                            if ($selectedTeacherIds = request()->input('tableFilters.teacher_id.values', [])) {
                                $q->whereIn('teacher_id', $selectedTeacherIds);
                            }
                        },
                        'scheduleSubjects.subject',
                        'scheduleSubjects.teacher',
                    ]);
                });
    }
}
