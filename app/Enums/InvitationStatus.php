<?php

namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum InvitationStatus: string implements HasColor, HasIcon, HasLabel
{
    case SUCCESS = 'Success';
    case PENDING = 'Pending';
    
    public function getColor(): string | array | null
    {
        return match ($this) {
            self::SUCCESS => 'success',
            self::PENDING => 'warning',
        };
    }

    public function getLabel(): ?string
    {    
        return match ($this) {
            self::SUCCESS => 'Success',
            self::PENDING => 'Pending',
        };
    }

    public function getIcon(): ?string 
    {
        return match ($this) {
            self::SUCCESS => 'heroicon-o-check',
            self::PENDING => 'heroicon-o-clock',
        };
    }
}