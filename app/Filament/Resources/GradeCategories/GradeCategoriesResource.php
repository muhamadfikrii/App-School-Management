<?php

namespace App\Filament\Resources\GradeCategories;

use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Models\GradeCategories;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\GradeCategories\Pages\EditGradeCategories;
use App\Filament\Resources\GradeCategories\Pages\ListGradeCategories;
use App\Filament\Resources\GradeCategories\Pages\ViewGradeCategories;
use App\Filament\Resources\GradeCategories\Pages\CreateGradeCategories;
use App\Filament\Resources\GradeCategories\Schemas\GradeCategoriesForm;
use App\Filament\Resources\GradeCategories\Tables\GradeCategoriesTable;
use App\Filament\Resources\GradeCategories\Schemas\GradeCategoriesInfolist;

class GradeCategoriesResource extends Resource
{
    protected static ?string $model = GradeCategories::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentPlus;

    protected static ?string $recordTitleAttribute = 'yes';

    public static function form(Schema $schema): Schema
    {
        return GradeCategoriesForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return GradeCategoriesInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GradeCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Kategori Nilai';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Kategori Nilai';
    }

    public static function getNavigationLabel(): string
    {
        return 'Kategori Nilai';
    }



    public static function getPages(): array
    {
        return [
            'index' => ListGradeCategories::route('/'),
            'create' => CreateGradeCategories::route('/create'),
            'view' => ViewGradeCategories::route('/{record}'),
            'edit' => EditGradeCategories::route('/{record}/edit'),
        ];
    }
}
