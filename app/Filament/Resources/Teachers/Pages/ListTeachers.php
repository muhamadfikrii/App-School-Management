<?php

namespace App\Filament\Resources\Teachers\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Teachers\TeacherResource;

class ListTeachers extends ListRecords
{
    protected static string $resource = TeacherResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make(),
    //     ];
    // }
}
