<?php

namespace App\Filament\Resources\Levels;

use BackedEnum;
use App\Enums\Roles;
use App\Models\Level;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\Levels\Pages\EditLevel;
use App\Filament\Resources\Levels\Pages\ViewLevel;
use App\Filament\Resources\Levels\Pages\ListLevels;
use App\Filament\Resources\Levels\Pages\CreateLevel;
use App\Filament\Resources\Levels\Schemas\LevelForm;
use App\Filament\Resources\Levels\Tables\LevelsTable;
use App\Filament\Resources\Levels\Schemas\LevelInfolist;

class LevelResource extends Resource
{
    protected static ?string $model = Level::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BookOpen;

    public static function canAccess(): bool
    {
        return auth()->user()?->hasRole(Roles::ADMINISTRATOR->value);
    }

    public static function form(Schema $schema): Schema
    {
        return LevelForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LevelInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LevelsTable::configure($table);
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
            'index' => ListLevels::route('/'),
            'create' => CreateLevel::route('/create'),
            // 'view' => ViewLevel::route('/{record}'),
            'edit' => EditLevel::route('/{record}/edit'),
        ];
    }
}
