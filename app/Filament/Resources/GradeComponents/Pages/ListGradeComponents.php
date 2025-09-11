<?php

namespace App\Filament\Resources\GradeComponents\Pages;

use App\Filament\Resources\GradeComponents\GradeComponentsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGradeComponents extends ListRecords
{
    protected static string $resource = GradeComponentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
