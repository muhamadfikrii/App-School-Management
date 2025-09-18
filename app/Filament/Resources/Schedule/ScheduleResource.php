<?php

namespace App\Filament\Resources\Schedule;

use UnitEnum;
use BackedEnum;
use App\Models\Schedule;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Schedule\Pages\EditSchedule;
use App\Filament\Resources\Schedule\Pages\ListSchedule;
use App\Filament\Resources\Schedule\Pages\ViewSchedule;
use App\Filament\Resources\Schedule\Pages\CreateSchedule;
use App\Filament\Resources\Schedule\Schemas\SchedulesForm;
use App\Filament\Resources\Schedule\Tables\SchedulesTable;
use App\Filament\Resources\Schedule\Schemas\SchedulesInfolist;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static  string | UnitEnum | null $navigationGroup = 'Kurikulum';

    protected static ?int $navigationSort = 3;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentDuplicate;

    protected static ?string $recordTitleAttribute = 'id';


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

    public static function getGlobalSearchResultTitle(Model $record): string|Htmlable
    {
        return $record->classRombel->name ?? 'Kelas Tidak ada';
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'day',
            'classRombel.name',
            'scheduleSubjects.subject.name',
            'scheduleSubjects.teacher.full_name',
        ];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $mapels = $record->scheduleSubjects
            ->map(fn($detail) => $detail->subject?->name)
            ->filter()
            ->join(', ');

        $gurus = $record->scheduleSubjects
            ->map(fn($detail) => $detail->teacher?->full_name)
            ->filter()
            ->join(', ');

        return [
            'Hari' => $record->day,
            'Mata Pelajaran' => $mapels ?: 'Mapel belum ditambahkan',
            'Guru' => $gurus ?: 'Belum ada guru',
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        $search = request('search') ?? '';

        return parent::getGlobalSearchEloquentQuery()
            ->with(['classRombel', 'scheduleSubjects.subject', 'scheduleSubjects.teacher'])
            ->when($search, function ($query) use ($search) {
                $query->where(function ($sub) use ($search) {
                    $sub->whereHas('classRombel', fn($q) =>
                            $q->where('name', 'like', "%{$search}%"))
                        ->orWhereHas('scheduleSubjects.subject', fn($q) =>
                            $q->where('name', 'like', "%{$search}%"))
                        ->orWhereHas('scheduleSubjects.teacher', fn($q) =>
                            $q->where('full_name', 'like', "%{$search}%"))
                        ->orWhere('day', 'like', "%{$search}%");
                });
            });
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
