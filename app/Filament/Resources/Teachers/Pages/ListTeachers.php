<?php

namespace App\Filament\Resources\Teachers\Pages;

use App\Filament\Resources\Teachers\TeacherResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Enums\UserRole;

class ListTeachers extends ListRecords
{
    protected static string $resource = TeacherResource::class;
}
