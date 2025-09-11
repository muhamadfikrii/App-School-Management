<?php

namespace App\Filament\Resources\GradeComponents\Pages;

use App\Models\GradeComponents;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\GradeComponents\GradeComponentsResource;

class CreateGradeComponents extends CreateRecord
{
    protected static string $resource = GradeComponentsResource::class;

   public function getRedirectUrl(): string 
    {
        return GradeComponentsResource::getUrl();
    }
}
