<?php

namespace App\Filament\Resources\Reports;

use App\Filament\Resources\Reports\Pages\CreateReport;
use App\Filament\Resources\Reports\Pages\EditReport;
use App\Filament\Resources\Reports\Pages\ListReports;
use App\Filament\Resources\Reports\Pages\ViewReport;
use App\Filament\Resources\Reports\Schemas\ReportForm;
use App\Filament\Resources\Reports\Schemas\ReportInfolist;
use App\Filament\Resources\Reports\Tables\ReportsTable;
use App\Models\FinalGrade;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ReportResource extends Resource
{
    protected static ?string $model = FinalGrade::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return ReportForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ReportInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReportsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Nilai Akhir';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Nilai Akhir';
    }

    public static function getNavigationLabel(): string
    {
        return 'Nilai Akhir';
    }

    public static function getGlobalSearchResultTitle(Model $record): string|Htmlable
    {
        return $record->student->full_name;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['student.full_name', 'classRombel.name', 'gradesDetail.final_score'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $finalScores = $record->gradesDetail
            ->map(fn ($detail) => $detail->final_score)
            ->join(', ');

        $mapels = $record->gradesDetail
            ->map(fn ($detail) => $detail->subject->name)
            ->join(', ');

        return [
            'Kelas' => $record->classRombel->name,
            'Semester' => $record->semester,
            'Mapel' => $mapels,
            'Nilai' => $finalScores,
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['student', 'classRombel', 'gradesDetail', 'gradesDetail.subject']);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReports::route('/'),
            'create' => CreateReport::route('/create/{student?}'),
            // 'view' => ViewReport::route('/{record}'),
            'edit' => EditReport::route('/{record}/edit'),
        ];
    }
}
