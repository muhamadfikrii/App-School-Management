<?php

namespace App\Filament\Resources\Teachers;

use BackedEnum;
use App\Enums\UserRole;
use App\Models\Teacher;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Teachers\Pages\EditTeacher;
use App\Filament\Resources\Teachers\Pages\ViewTeacher;
use App\Filament\Resources\Teachers\Pages\ListTeachers;
use App\Filament\Resources\Teachers\Pages\CreateTeacher;
use App\Filament\Resources\Teachers\Schemas\TeacherForm;
use App\Filament\Resources\Teachers\Tables\TeachersTable;
use App\Filament\Resources\Teachers\Schemas\TeacherInfolist;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-presentation-chart-line';

    protected static ?string $recordTitleAttribute = 'yes';

    // public static function canAccess(): bool
    // {
    //     return auth('web')->user()?->is_admin ?? false;
    // }

    public static function form(Schema $schema): Schema
    {
        return TeacherForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TeacherInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TeachersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    public static function canCreate(): bool
    {
        return false;
    }

    public static function getModelLabel(): string
    {
        return 'Guru';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Data Guru';
    }

    public static function getNavigationLabel(): string
    {
        return 'Guru';
    }


    public static function getPages(): array
    {
        return [
            'index' => ListTeachers::route('/'),
            // 'create' => CreateTeacher::route('/create'),
            'view' => ViewTeacher::route('/{record}'),
            'edit' => EditTeacher::route('/{record}/edit'),
        ];
    }
}
