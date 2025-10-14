<?php

namespace App\Filament\Resources\GradeComponents\Pages;

use App\Filament\Resources\GradeComponents\GradeComponentsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGradeComponents extends CreateRecord
{
    protected static string $resource = GradeComponentsResource::class;

    public function getRedirectUrl(): string
    {
        return GradeComponentsResource::getUrl();
    }
}
