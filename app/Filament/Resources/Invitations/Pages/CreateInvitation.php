<?php

namespace App\Filament\Resources\Invitations\Pages;

use App\Mail\InvitationMail;
use Illuminate\Support\Facades\Mail;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Invitations\InvitationResource;

class CreateInvitation extends CreateRecord
{
    protected static string $resource = InvitationResource::class;

     protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['status'] = 'pending';
        return $data;
    }

    protected function afterCreate(): void
    {
    $invitation = $this->record; 
    Mail::to($invitation->email)->send(new InvitationMail($invitation));
    }

    protected function getRedirectUrl(): string
    {
        // Setelah invite sukses, balik ke daftar
        return $this->getResource()::getUrl('index');
    }
}
