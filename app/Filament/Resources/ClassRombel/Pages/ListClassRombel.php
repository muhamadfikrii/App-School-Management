<?php

namespace App\Filament\Resources\ClassRombel\Pages;

use App\Filament\Resources\ClassRombel\ClassRombelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClassRombel extends ListRecords
{
    protected static string $resource = ClassRombelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
