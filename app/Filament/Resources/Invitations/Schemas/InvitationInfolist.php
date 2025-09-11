<?php

namespace App\Filament\Resources\Invitations\Schemas;

use Filament\Schemas\Schema;

use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;

class InvitationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->columns(1)
        ->components([
            Section::make("Data Invitation")
                ->schema([
                    Grid::make(2)->schema([
                        TextEntry::make("name")
                        ->label('Nama'),
                        TextEntry::make("email")
                        ->label("Email"),
                        TextEntry::make("status")
                        ->label("Status")
                        ->badge(),
                        TextEntry::make("inviter.name")
                        ->label("Di undang oleh"),
                        TextEntry::make("created_at"),
                        TextEntry::make("updated_at")
                    ]),
                ]),
        ]);
    }
}
