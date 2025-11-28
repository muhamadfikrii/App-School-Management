<?php

namespace App\Filament\Resources\Reports\Pages;

use App\Filament\Resources\Reports\ReportResource;
use App\Models\Student;
use Filament\Resources\Pages\CreateRecord;

use function request;

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
