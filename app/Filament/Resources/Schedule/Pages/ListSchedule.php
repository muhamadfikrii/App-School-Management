<?php

namespace App\Filament\Resources\Schedule\Pages;

use App\Filament\Exports\SchedulesExporter;
use App\Filament\Resources\Schedule\ScheduleResource;
use Filament\Actions\CreateAction;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ListRecords;

class ListSchedule extends ListRecords
{
    protected static string $resource = ScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            ExportAction::make()
                ->label('Export Jadwal Pelajaran')
                ->exporter(SchedulesExporter::class)
                ->color('danger')
                ->icon('heroicon-s-arrow-down-tray')
                ->fileName('jadwal-mengajar'),
        ];
    }
}
