<?php

namespace App\Filament\Resources\Subjects;

use UnitEnum;
use BackedEnum;
use App\Enums\UserRole;
use App\Models\Subject;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\Subjects\Pages\EditSubject;
use App\Filament\Resources\Subjects\Pages\ViewSubject;
use App\Filament\Resources\Subjects\Pages\ListSubjects;
use App\Filament\Resources\Subjects\Pages\CreateSubject;
use App\Filament\Resources\Subjects\Schemas\SubjectForm;
use App\Filament\Resources\Subjects\Tables\SubjectsTable;
use App\Filament\Resources\Subjects\Schemas\SubjectInfolist;

class SubjectResource extends Resource
{
    protected static ?string $model = Subject::class;

    protected static  string | UnitEnum | null $navigationGroup = 'Kurikulum';

    protected static ?int $navigationSort = 1;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ClipboardDocument;

    // protected static ?string $recordTitleAttribute = 'yes';

    public static function canAccess(): bool
    {
        return auth('web')->user()?->is_admin ?? false;
    }

    public static function form(Schema $schema): Schema
    {
        return SubjectForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SubjectInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubjectsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Mata Pelajaran';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Mata Pelajaran';
    }

    public static function getNavigationLabel(): string
    {
        return 'Mata Pelajaran';
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSubjects::route('/'),
            'create' => CreateSubject::route('/create'),
            'view' => ViewSubject::route('/{record}'),
            'edit' => EditSubject::route('/{record}/edit'),
        ];
    }
}
