<?php

namespace App\Filament\Resources\Students;

use App\Filament\Resources\Students\RelationManagers\GradeRelationManager;
use BackedEnum;
use UnitEnum;
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

    protected static  string | UnitEnum | null $navigationGroup = 'Manajemen Siswa';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUser;

    public static function canAccess(): bool
    {
        $user = auth()->user();

        if ($user->is_admin) {
            return true;
        }

        if ($user->is_teacher && $user->teacher && $user->teacher->classes) {
            return true;
        }

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

    public static function getModelLabel(): string
    {
        return 'Siswa';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Data Siswa';
    }

    public static function getNavigationLabel(): string
    {
        return 'Siswa';
    }

    public static function getRelations(): array
    {
        return [
            GradeRelationManager::class,
        ];
    }

    public function isReadOnly(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStudents::route('/'),
            'create' => CreateStudents::route('/create'),
            'edit' => EditStudents::route('/{record}/edit'),
        ];
    }
}
