<?php

namespace App\Filament\Resources\Students\Pages;

use App\Filament\Resources\Students\StudentsResource;

use function auth;

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

        if ($user->is_teacher) {
            $data['class_rombel_id'] = $user->teacher->classRombel->id ?? $data['class_rombel_id'] ?? null;
        }

        return $data;
    }
}
