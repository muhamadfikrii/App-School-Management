<?php

namespace App\Filament\Resources\GradeComponents\Pages;

use App\Models\GradeComponent;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\GradeComponents\GradeComponentsResource;

class EditGradeComponents extends EditRecord
{
    protected static string $resource = GradeComponentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    public function getRedirectUrl(): string
    {
        return GradeComponentsResource::getUrl();
    }
}
