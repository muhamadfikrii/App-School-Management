<?php

namespace App\Filament\Resources\ClassRombel;

use BackedEnum;
use UnitEnum;
use App\Enums\UserRole;
use App\Filament\Resources\ClassRombel\ClassRombelResource\RelationManagers\StudentsRelationManager;
use Filament\Tables\Table;
use App\Models\ClassRombel;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\ClassRombel\Pages\EditClassRombel;
use App\Filament\Resources\ClassRombel\Pages\ListClassRombel;
use App\Filament\Resources\ClassRombel\Pages\ViewClassRombel;
use App\Filament\Resources\ClassRombel\Pages\CreateClassRombel;
use App\Filament\Resources\ClassRombel\Schemas\ClassRombelForm;
use App\Filament\Resources\ClassRombel\Tables\ClassRombelTable;
use App\Filament\Resources\ClassRombel\Schemas\ClassRombelInfolist;

class ClassRombelResource extends Resource
{
    protected static ?string $model = ClassRombel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BuildingLibrary;

    protected static  string | UnitEnum | null $navigationGroup = 'Manajemen Siswa';

    public static function canAccess(): bool
    {
        $user = auth('web')->user();
        $model = static::getModel();

        if ($user->is_admin) {
            return true;
        }

        if ($user->is_teacher && $user->teacher) {
            return $model::where('teacher_id', $user->teacher->id)->exists();
        }

        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return ClassRombelForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ClassRombelInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClassRombelTable::configure($table)
        ->paginated([10, 20, 25, 30]);

    }

    public static function getRelations(): array
    {
        return [
            StudentsRelationManager::class
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Rombel';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Data Rombel';
    }

    public static function getNavigationLabel(): string
    {
        return 'Rombel';
    }

    public static function getPages(): array
    {
        return [
            'index' => ListClassRombel::route('/'),
            'create' => CreateClassRombel::route('/create'),
            'view' => ViewClassRombel::route('/{record}'),
            'edit' => EditClassRombel::route('/{record}/edit'),
        ];
    }
}
