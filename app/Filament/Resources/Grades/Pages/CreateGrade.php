<?php

namespace App\Filament\Resources\Grades\Pages;

use App\Models\Student;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Grades\GradeResource;

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
}
