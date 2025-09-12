<?php

namespace App\Filament\Resources\SubjectCategories;

use App\Filament\Resources\SubjectCategories\Pages\CreateSubjectCategories;
use App\Filament\Resources\SubjectCategories\Pages\EditSubjectCategories;
use App\Filament\Resources\SubjectCategories\Pages\ListSubjectCategories;
use App\Filament\Resources\SubjectCategories\Pages\ViewSubjectCategories;
use App\Filament\Resources\SubjectCategories\Schemas\SubjectCategoriesForm;
use App\Filament\Resources\SubjectCategories\Schemas\SubjectCategoriesInfolist;
use App\Filament\Resources\SubjectCategories\Tables\SubjectCategoriesTable;
use App\Models\SubjectCategories;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SubjectCategoriesResource extends Resource
{
    protected static ?string $model = SubjectCategories::class;

    protected static  string | UnitEnum | null $navigationGroup = 'Kurikulum';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SubjectCategories';

    public static function form(Schema $schema): Schema
    {
        return SubjectCategoriesForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SubjectCategoriesInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubjectCategoriesTable::configure($table);
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
            'index' => ListSubjectCategories::route('/'),
            'create' => CreateSubjectCategories::route('/create'),
            'view' => ViewSubjectCategories::route('/{record}'),
            'edit' => EditSubjectCategories::route('/{record}/edit'),
        ];
    }
}
