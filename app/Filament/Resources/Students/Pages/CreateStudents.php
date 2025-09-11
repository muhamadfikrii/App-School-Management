<?php

namespace App\Filament\Resources\Students\Pages;

use App\Filament\Resources\Students\StudentsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStudents extends CreateRecord
{

    protected static string $resource = StudentsResource::class;

    protected function getRedirectUrl(): string
    {
        return StudentsResource::getUrl();
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = auth()->user();

        if ($user->hasRole('guru')) {
        $data['classes_id'] = $user->teacher->classes->id ?? $data['classes_id'] ?? null;
    }   

        return $data;
    }
}
