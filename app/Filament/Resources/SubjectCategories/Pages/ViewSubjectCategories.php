<?php

namespace App\Filament\Resources\SubjectCategories\Pages;

use App\Filament\Resources\SubjectCategories\SubjectCategoriesResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSubjectCategories extends ViewRecord
{
    protected static string $resource = SubjectCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
