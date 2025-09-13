<?php

namespace App\Filament\Resources\GroupSubject\Pages;

use App\Filament\Resources\GroupSubject\GroupSubjectResource;
use App\Models\GroupSubject;
use Filament\Resources\Pages\CreateRecord;

class CreateGroupSubject extends CreateRecord
{
    protected static string $resource = GroupSubjectResource::class;

    public function getRedirectUrl(): string
    {
        return GroupSubjectResource::getUrl();
    }
}
