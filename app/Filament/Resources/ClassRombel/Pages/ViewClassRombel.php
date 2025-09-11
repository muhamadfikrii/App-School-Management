<?php


namespace App\Filament\Resources\ClassRombel\Pages;

use App\Filament\Resources\ClassRombel\ClassRombelResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewClassRombel extends ViewRecord
{
    protected static string $resource = ClassRombelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
