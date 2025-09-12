<?php

namespace App\Filament\Resources\SubjectCategories\Pages;

use App\Filament\Resources\SubjectCategories\SubjectCategoriesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSubjectCategories extends ListRecords
{
    protected static string $resource = SubjectCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
