<?php

namespace App\Filament\Resources\Reports\Pages;

use App\Models\Student;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Reports\ReportResource;

class CreateReport extends CreateRecord
{
    public ?Student $student = null;

    protected static string $resource = ReportResource::class;

    public function mount(): void
    {
        parent::mount();

        $student = request()->route()?->parameter('student');

        if ($student) {
            $this->student = $student;
        }
    }
}
