<?php

namespace App\Filament\Resources\Students\Pages;

use App\Filament\Resources\Students\StudentsResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditStudents extends EditRecord
{
    protected static string $resource = StudentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
