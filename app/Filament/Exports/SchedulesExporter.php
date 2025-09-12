<?php

namespace App\Filament\Exports;

use App\Models\Schedule;
use Illuminate\Support\Number;
use Filament\Actions\Exports\Exporter;
use OpenSpout\Common\Entity\Style\Style;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Models\Export;
use OpenSpout\Common\Entity\Style\CellAlignment;

class ScheduleExporter extends Exporter
{
    protected static ?string $model = Schedule::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('day')
                ->label('Hari'),
            ExportColumn::make('time_start')
                ->label('Mulai'),
            ExportColumn::make('time_end')
                ->label('Selesai'),
            ExportColumn::make('classRombel.name')
                ->label('Kelas'),
            ExportColumn::make('subject.name')
                ->label('Mata Pelajaran'),
            ExportColumn::make('teacher.full_name')
                ->label('Guru'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your schedule export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }

    public function getXlsxCellStyle(): ?Style
    {
    return (new Style())
        ->setFontSize(12)
        ->setFontBold()
        ->setCellAlignment(CellAlignment::CENTER)
        ->setFontName('Consolas');
    }

}
