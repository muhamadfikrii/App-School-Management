<?php

namespace App\Filament\Resources\Invitations\Pages;


use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Invitations\InvitationResource;

class ListInvitations extends ListRecords
{
    protected static string $resource = InvitationResource::class;

    // Properti untuk modal verify
    public ?int $verifyRecordId = null;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->createAnother(false),
        ];
    }
}
