<?php

namespace App\Filament\Resources\SubjectCategories\Pages;

use App\Filament\Resources\SubjectCategories\SubjectCategoriesResource;
use App\Models\SubjectCategories;
use Filament\Resources\Pages\CreateRecord;

class CreateSubjectCategories extends CreateRecord
{
    protected static string $resource = SubjectCategoriesResource::class;

    public function getRedirectUrl(): string
    {
        return SubjectCategoriesResource::getUrl();
    }
}
