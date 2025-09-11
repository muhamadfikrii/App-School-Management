<?php

namespace App\Filament\Resources\ClassRombel\Pages;

use App\Filament\Resources\ClassRombel\ClassRombelResource;
use Filament\Resources\Pages\CreateRecord;

class CreateClassRombel extends CreateRecord
{
    protected static string $resource = ClassRombelResource::class;

    public function getRedirectUrl(): string 
    {
        return ClassRombelResource::getUrl();
    }
}
