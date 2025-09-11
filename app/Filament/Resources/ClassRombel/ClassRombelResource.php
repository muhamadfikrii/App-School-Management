<?php

namespace App\Filament\Resources\ClassRombel;

use BackedEnum;
use App\Enums\Roles;
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

    public static function canAccess(): bool
    {
        return auth()->user()?->hasRole(Roles::ADMINISTRATOR->value);
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
            //
        ];
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
