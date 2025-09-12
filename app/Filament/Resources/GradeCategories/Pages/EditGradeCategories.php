<?php

namespace App\Filament\Resources\GradeCategories\Pages;

use App\Filament\Resources\GradeCategories\GradeCategoriesResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditGradeCategories extends EditRecord
{
    protected static string $resource = GradeCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

        public function getRedirectUrl(): string
    {
        return GradeCategoriesResource::getUrl();
    }
}
