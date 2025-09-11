<?php

namespace App\Filament\Resources\GradeComponents\Pages;

use App\Filament\Resources\GradeComponents\GradeComponentsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewGradeComponents extends ViewRecord
{
    protected static string $resource = GradeComponentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
