<?php

namespace App\Filament\Resources\GradeComponents;

use BackedEnum;
use App\Enums\UserRole;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Models\GradeComponent;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\GradeComponents\Pages\EditGradeComponents;
use App\Filament\Resources\GradeComponents\Pages\ListGradeComponents;
use App\Filament\Resources\GradeComponents\Pages\ViewGradeComponents;
use App\Filament\Resources\GradeComponents\Pages\CreateGradeComponents;
use App\Filament\Resources\GradeComponents\Schemas\GradeComponentsForm;
use App\Filament\Resources\GradeComponents\Tables\GradeComponentsTable;
use App\Filament\Resources\GradeComponents\Schemas\GradeComponentsInfolist;

class GradeComponentsResource extends Resource
{
    protected static ?string $model = GradeComponent::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'yes';

    public static function canAccess(): bool
    {
        return auth('web')->user()?->is_admin ?? false;
    }

    public static function form(Schema $schema): Schema
    {
        return GradeComponentsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return GradeComponentsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GradeComponentsTable::configure($table);
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
            'index' => ListGradeComponents::route('/'),
            'create' => CreateGradeComponents::route('/create'),
            'view' => ViewGradeComponents::route('/{record}'),
            'edit' => EditGradeComponents::route('/{record}/edit'),
        ];
    }
}
