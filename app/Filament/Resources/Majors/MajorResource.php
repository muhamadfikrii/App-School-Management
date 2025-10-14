<?php

namespace App\Filament\Resources\Majors;

use App\Filament\Resources\Majors\Pages\CreateMajor;
use App\Filament\Resources\Majors\Pages\EditMajor;
use App\Filament\Resources\Majors\Pages\ListMajors;
use App\Filament\Resources\Majors\Pages\ViewMajor;
use App\Filament\Resources\Majors\Schemas\MajorForm;
use App\Filament\Resources\Majors\Schemas\MajorInfolist;
use App\Filament\Resources\Majors\Tables\MajorsTable;
use App\Models\Major;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class MajorResource extends Resource
{
    protected static ?string $model = Major::class;

    protected static string|UnitEnum|null $navigationGroup = 'Manajemen Siswa';

    protected static ?int $navigationSort = 2;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Briefcase;

    public static function canAccess(): bool
    {
        return auth('web')->user()?->is_admin ?? false;
    }

    public static function form(Schema $schema): Schema
    {
        return MajorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MajorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MajorsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Jurusan';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Jurusan';
    }

    public static function getNavigationLabel(): string
    {
        return 'Jurusan';
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMajors::route('/'),
            'create' => CreateMajor::route('/create'),
            // 'view' => ViewMajor::route('/{record}'),
            'edit' => EditMajor::route('/{record}/edit'),
        ];
    }
}
