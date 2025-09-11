<?php

namespace App\Filament\Resources\Academics;

use BackedEnum;
use App\Enums\Roles;
use Filament\Tables\Table;
use App\Models\AcademicYear;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\Academics\Pages\EditAcademic;
use App\Filament\Resources\Academics\Pages\ViewAcademic;
use App\Filament\Resources\Academics\Pages\ListAcademics;
use App\Filament\Resources\Academics\Pages\CreateAcademic;
use App\Filament\Resources\Academics\Schemas\AcademicForm;
use App\Filament\Resources\Academics\Tables\AcademicsTable;
use App\Filament\Resources\Academics\Schemas\AcademicInfolist;

class AcademicResource extends Resource
{
    protected static ?string $model = AcademicYear::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CalendarDays;

    protected static ?string $recordTitleAttribute = 'yes';

    public static function canAccess(): bool
    {
        return auth()->user()?->hasRole(Roles::ADMINISTRATOR->value);
    }

    public static function form(Schema $schema): Schema
    {
        return AcademicForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AcademicInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AcademicsTable::configure($table);
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
            'index' => ListAcademics::route('/'),
            'create' => CreateAcademic::route('/create'),
            'view' => ViewAcademic::route('/{record}'),
            'edit' => EditAcademic::route('/{record}/edit'),
        ];
    }
}
