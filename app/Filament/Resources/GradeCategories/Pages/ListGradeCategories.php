<?php

namespace App\Filament\Resources\GradeCategories\Pages;

use App\Filament\Resources\GradeCategories\GradeCategoriesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGradeCategories extends ListRecords
{
    protected static string $resource = GradeCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
