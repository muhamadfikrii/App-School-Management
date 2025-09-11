<?php

namespace App\Filament\Resources\ClassRombel\Pages;

use App\Filament\Resources\ClassRombel\ClassRombelResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditClassRombel extends EditRecord
{
    protected static string $resource = ClassRombelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return ClassRombelResource::getUrl();
    }
}
