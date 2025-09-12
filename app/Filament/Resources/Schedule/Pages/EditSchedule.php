<?php

namespace App\Filament\Resources\Schedule\Pages;

use App\Filament\Resources\Schedule\ScheduleResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSchedule extends EditRecord
{
    protected static string $resource = ScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            // DeleteAction::make(),
        ];
    }

    public function getRedirectUrl(): string
    {
        return ScheduleResource::getUrl();
    }
}
