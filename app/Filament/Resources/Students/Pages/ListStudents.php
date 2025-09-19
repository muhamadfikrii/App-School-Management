<?php

namespace App\Filament\Resources\Students\Pages;

use App\Filament\Exports\StudentExporter;
use App\Filament\Resources\Students\StudentsResource;
use Filament\Actions\CreateAction;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ListRecords;

class ListStudents extends ListRecords
{
    protected static string $resource = StudentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Tambah Siswa'),
            ExportAction::make()->label('Export Data Siswa')
                ->color('danger')
                ->icon('heroicon-s-arrow-down-tray')
                ->fileName('data-siswa')
                ->exporter(StudentExporter::class)

        ];
    }
}
