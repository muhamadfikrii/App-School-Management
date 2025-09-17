<?php

namespace App\Filament\Resources\Schedule;

use UnitEnum;
use BackedEnum;
use App\Enums\UserRole;
use App\Models\Schedule;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\Schedule\Pages\EditSchedule;
use App\Filament\Resources\Schedule\Pages\ListSchedule;
use App\Filament\Resources\Schedule\Pages\ViewSchedule;
use App\Filament\Resources\Schedule\Pages\CreateSchedule;
use App\Filament\Resources\Schedule\Schemas\ScheduleForm;
use App\Filament\Resources\Schedule\Tables\ScheduleTable;
use App\Filament\Resources\Schedule\Schemas\SchedulesForm;
use App\Filament\Resources\Schedule\Tables\SchedulesTable;
use App\Filament\Resources\Schedule\Schemas\ScheduleInfolist;
use App\Filament\Resources\Schedule\Schemas\SchedulesInfolist;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static  string | UnitEnum | null $navigationGroup = 'Kurikulum';

    protected static ?int $navigationSort = 3;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentDuplicate;

    // protected static ?string $recordTitleAttribute = 'yes';


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

    public static function getModelLabel(): string
    {
        return 'Jadwal Pelajaran';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Jadwal Pelajaran';
    }

    public static function getNavigationLabel(): string
    {
        return 'Jadwal Pelajaran';
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSchedule::route('/'),
            'create' => CreateSchedule::route('/create'),
            'view' => ViewSchedule::route('/{record}'),
            // 'edit' => EditSchedule::route('/{record}/edit'),
        ];
    }
}
