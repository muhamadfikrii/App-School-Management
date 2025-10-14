<?php

namespace App\Filament\Resources\Grades\Pages;

use App\Filament\Resources\Grades\GradeResource;
use App\Models\Student;
use Filament\Resources\Pages\CreateRecord;

class CreateGrade extends CreateRecord
{
    protected static string $resource = GradeResource::class;

    public ?Student $student = null;

    public function getRedirectUrl(): string
    {
        return GradeResource::getUrl();
    }

    public function mount(): void
    {
        parent::mount();

        $student = request()->route()?->parameter('student');

        if ($student) {
            $this->student = $student;
        }
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (auth()->user()->is_teacher && auth()->user()->teacher) {
            $data['teacher_id'] = auth()->user()->teacher->id;
        }

        return $data;
    }
}
