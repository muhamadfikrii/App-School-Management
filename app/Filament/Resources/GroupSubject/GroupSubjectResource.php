<?php

namespace App\Filament\Resources\GroupSubject;

use App\Filament\Resources\GroupSubject\Pages\CreateGroupSubject;
use App\Filament\Resources\GroupSubject\Pages\EditGroupSubject;
use App\Filament\Resources\GroupSubject\Pages\ListGroupSubject;
use App\Filament\Resources\GroupSubject\Pages\ViewGroupSubject;
use App\Filament\Resources\GroupSubject\Schemas\GroupSubjectForm;
use App\Filament\Resources\GroupSubject\Schemas\GroupSubjectInfolist;
use App\Filament\Resources\GroupSubject\Tables\GroupSubjectTable;
use App\Models\GroupSubject;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class GroupSubjectResource extends Resource
{
    protected static ?string $model = GroupSubject::class;

    protected static string|UnitEnum|null $navigationGroup = 'Kurikulum';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentPlus;

    // protected static ?string $recordTitleAttribute = 'GroupSubject';

    public static function form(Schema $schema): Schema
    {
        return GroupSubjectForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return GroupSubjectInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GroupSubjectTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Kategori Mapel';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Kategori Mapel';
    }

    public static function getNavigationLabel(): string
    {
        return 'Kategori Mapel';
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGroupSubject::route('/'),
            'create' => CreateGroupSubject::route('/create'),
            'view' => ViewGroupSubject::route('/{record}'),
            'edit' => EditGroupSubject::route('/{record}/edit'),
        ];
    }
}
