<?php

namespace App\Filament\Resources\GradeComponents;

use App\Filament\Resources\GradeComponents\Pages\CreateGradeComponents;
use App\Filament\Resources\GradeComponents\Pages\EditGradeComponents;
use App\Filament\Resources\GradeComponents\Pages\ListGradeComponents;
use App\Filament\Resources\GradeComponents\Pages\ViewGradeComponents;
use App\Filament\Resources\GradeComponents\Schemas\GradeComponentsForm;
use App\Filament\Resources\GradeComponents\Schemas\GradeComponentsInfolist;
use App\Filament\Resources\GradeComponents\Tables\GradeComponentsTable;
use App\Models\GradeComponent;

use function auth;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GradeComponentsResource extends Resource
{
    protected static ?string $model = GradeComponent::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedPresentationChartBar;

    // protected static ?string $recordTitleAttribute = 'yes';

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

        ];
    }

    public static function getModelLabel(): string
    {
        return 'Komponen Nilai';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Komponen Nilai';
    }

    public static function getNavigationLabel(): string
    {
        return 'Komponen Nilai';
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListGradeComponents::route('/'),
            'create' => CreateGradeComponents::route('/create'),
            'view'   => ViewGradeComponents::route('/{record}'),
            'edit'   => EditGradeComponents::route('/{record}/edit'),
        ];
    }
}
