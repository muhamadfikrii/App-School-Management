<?php

namespace App\Filament\Resources\Grades;

use App\Filament\Resources\Grades\Pages\CreateGrade;
use App\Filament\Resources\Grades\Pages\EditGrade;
use App\Filament\Resources\Grades\Pages\ListGrades;
use App\Filament\Resources\Grades\Pages\ViewGrade;
use App\Filament\Resources\Grades\Schemas\GradeForm;
use App\Filament\Resources\Grades\Schemas\GradeInfolist;
use App\Filament\Resources\Grades\Tables\GradesTable;
use App\Models\Grade;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class GradeResource extends Resource
{
    protected static ?string $model = Grade::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::TableCells;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return GradeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return GradeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GradesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getModelLabel(): string
    {
        return 'Nilai';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Data Nilai';
    }

    public static function getNavigationLabel(): string
    {
        return 'Nilai';
    }

    public static function getGlobalSearchResultTitle(Model $record): string | Htmlable
    {
        return $record->student->full_name;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['student.full_name', 'classRombel.name', 'gradeComponent.weight', 'subject.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Kelas' => $record->classRombel->name,
            'Nilai' => $record->gradeComponent->weight,
            'Mapel' => $record->subject->name,
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['student', 'classRombel', 'gradeComponent', 'subject']);
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListGrades::route('/'),
            'create' => CreateGrade::route('/create/{student?}'),
            // 'view' => ViewGrade::route('/{record}'),
            'edit' => EditGrade::route('/{record}/edit'),
        ];
    }
}
