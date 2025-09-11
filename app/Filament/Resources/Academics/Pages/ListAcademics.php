<?php

namespace App\Filament\Resources\Academics\Pages;

use App\Filament\Resources\Academics\AcademicResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAcademics extends ListRecords
{
    protected static string $resource = AcademicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
