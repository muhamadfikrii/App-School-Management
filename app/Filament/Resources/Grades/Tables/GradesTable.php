<?php

namespace App\Filament\Resources\Grades\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\ExportAction;
use Illuminate\Support\Facades\Auth;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Exports\SchedulesExporter;
use Illuminate\Contracts\Database\Eloquent\Builder;

class GradesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("student.nisn")
                    ->label("NISN"),
                TextColumn::make("student.full_name")
                    ->label("Nama Siswa"),
                TextColumn::make("classRombel.name")
                    ->label("Kelas"),
                TextColumn::make("gradeComponent.name")
                    ->label("Komponen Nilai"),
                TextColumn::make("subject.name")
                    ->label("Mata Pelajaran"),
                TextColumn::make("score")
                    ->label("Nilai"),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                // ViewAction::make(),
                // EditAction::make(),
            ])
            ->paginated([10, 25, 50, 100, 'all'])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                    ->visible(fn() => auth()->user()->is_admin),
                ]),
            ])->modifyQueryUsing(function ($query) {
                $user = Auth::user();
                // dd($user->teacher);

                if (!$user->is_admin) {
                    $query->where("teacher_id", $user->teacher?->id);
                }
            });

    }
}
