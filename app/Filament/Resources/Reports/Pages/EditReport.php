<?php

namespace App\Filament\Resources\Reports\Pages;

use App\Filament\Resources\Reports\ReportResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\EditRecord;

use function route;

class EditReport extends EditRecord
{
    protected static string $resource = ReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make('export-pdf')
                ->label('Export Pdf')
                ->url(fn () => route('export.final-grade', ['finalGrade' => $this->record]))
                ->openUrlInNewTab()
                ->icon('heroicon-o-document'),
            DeleteAction::make(),
        ];
    }
}
