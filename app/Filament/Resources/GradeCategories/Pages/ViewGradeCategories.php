<?php

namespace App\Filament\Resources\GradeCategories\Pages;

use App\Filament\Resources\GradeCategories\GradeCategoriesResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewGradeCategories extends ViewRecord
{
    protected static string $resource = GradeCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
