<?php

namespace App\Filament\Resources\GroupSubject\Pages;

use App\Filament\Resources\GroupSubject\GroupSubjectResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditGroupSubject extends EditRecord
{
    protected static string $resource = GroupSubjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    public function getRedirectUrl(): string
    {
        return GroupSubjectResource::getUrl();
    }
}
