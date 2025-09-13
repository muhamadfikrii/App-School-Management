<?php

namespace App\Filament\Resources\GroupSubject\Pages;

use App\Filament\Resources\GroupSubject\GroupSubjectResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGroupSubject extends ListRecords
{
    protected static string $resource = GroupSubjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
