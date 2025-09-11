<?php

namespace App\Filament\Resources\Schedule\Pages;

use App\Filament\Resources\Schedule\ScheduleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSchedule extends CreateRecord
{
    protected static string $resource = ScheduleResource::class;

    public function getRedirectUrl(): string
    {
        return ScheduleResource::getUrl();
    }
}
