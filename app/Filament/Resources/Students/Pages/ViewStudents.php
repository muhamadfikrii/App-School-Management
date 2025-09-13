<?php

namespace App\Filament\Resources\Students\Pages;

use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\Students\StudentsResource;

class ViewStudents extends ViewRecord
{
    protected static string $resource = StudentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
