<?php

namespace App\Filament\Resources\GradeCategories\Pages;

use App\Filament\Resources\GradeCategories\GradeCategoriesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGradeCategories extends CreateRecord
{
    protected static string $resource = GradeCategoriesResource::class;

    public function getRedirectUrl(): string
    {
        return GradeCategoriesResource::getUrl();
    }
}
