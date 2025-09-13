<?php

namespace App\Filament\Resources\GroupSubject\Pages;

use App\Filament\Resources\GroupSubject\GroupSubjectResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewGroupSubject extends ViewRecord
{
    protected static string $resource = GroupSubjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
