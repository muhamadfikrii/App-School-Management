<?php

namespace App\Filament\Resources\Schedules;

use UnitEnum;
use BackedEnum;
use App\Enums\Roles;
use App\Models\Schedules;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\Schedules\Pages\EditSchedules;
use App\Filament\Resources\Schedules\Pages\ListSchedules;
use App\Filament\Resources\Schedules\Pages\ViewSchedules;
use App\Filament\Resources\Schedules\Pages\CreateSchedules;
use App\Filament\Resources\Schedules\Schemas\SchedulesForm;
use App\Filament\Resources\Schedules\Tables\SchedulesTable;
use App\Filament\Resources\Schedules\Schemas\SchedulesInfolist;

class SchedulesResource extends Resource
{
    protected static ?string $model = Schedules::class;

    protected static string | UnitEnum | null $navigationGroup = 'Manajemen Pembelajaran';
    protected static ?int $navigationSort = 3;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentDuplicate;

    protected static ?string $recordTitleAttribute = 'yes';


    public static function form(Schema $schema): Schema
    {
        return SchedulesForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SchedulesInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SchedulesTable::configure($table);
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
            'index' => ListSchedules::route('/'),
            'create' => CreateSchedules::route('/create'),
            'view' => ViewSchedules::route('/{record}'),
            // 'edit' => EditSchedules::route('/{record}/edit'),
        ];
    }
}
