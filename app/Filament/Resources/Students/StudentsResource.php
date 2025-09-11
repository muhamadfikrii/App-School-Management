<?php

namespace App\Filament\Resources\Students;

use App\Filament\Resources\Students\RelationManagers\GradeRelationManager;
use BackedEnum;
use App\Models\Student;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Students\Pages\EditStudents;
use App\Filament\Resources\Students\Pages\ListStudents;
use App\Filament\Resources\Students\Pages\ViewStudents;
use App\Filament\Resources\Students\Pages\CreateStudents;
use App\Filament\Resources\Students\Schemas\StudentsForm;
use App\Filament\Resources\Students\Tables\StudentsTable;
use App\Filament\Resources\Students\Schemas\StudentsInfolist;

class StudentsResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUser;

    public static function canAccess(): bool
    {
    $user = auth()->user();

    // Cek role administrator
    if ($user->hasRole('administrator')) {
        return true;
    }

    // Cek role guru yang punya kelas (wali kelas)
    if ($user->hasRole('guru') && $user->teacher && $user->teacher->classes) {
        return true;
    }

    // User lain tidak bisa akses
    return false;
    }


    public static function form(Schema $schema): Schema
    {
        return StudentsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StudentsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StudentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            GradeRelationManager::class,
        ];
    }


    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user = auth()->user();

        if ($user->hasRole('guru') && $user->teacher) {
            // Guru hanya bisa lihat student dari kelasnya sendiri
            return $query->where('classes_id', $user->teacher->classes->id);
        }

        // Admin bisa lihat semua
        return $query;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStudents::route('/'),
            'create' => CreateStudents::route('/create'),
            'view' => ViewStudents::route('/{record}'),
            'edit' => EditStudents::route('/{record}/edit'),
        ];
    }
}
