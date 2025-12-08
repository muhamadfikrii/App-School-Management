<?php

namespace App\Enums;

enum TeacherStatus: string
{
    case PNS     = 'PNS';
    case PPPK    = 'PPPK';
    case GTY     = 'GTY';
    case GTT     = 'GTT';
    case Honorer = 'Honorer';
    case Kontrak = 'Kontrak';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PNS     => 'PNS',
            self::PPPK    => 'PPPK',
            self::GTY     => 'Guru Tetap',
            self::GTT     => 'Guru Tidak Tetap',
            self::Honorer => 'Honorer',
            self::Kontrak => 'Kontrak',
        };
    }

    public function label(): ?string
    {
        return $this->getLabel();
    }

    public function badgeClass(): string
    {
        return match ($this) {
            self::PNS     => 'bg-green-100 text-green-800',
            self::PPPK    => 'bg-blue-100 text-blue-800',
            self::GTY     => 'bg-purple-100 text-purple-800',
            self::GTT     => 'bg-yellow-100 text-yellow-800',
            self::Honorer => 'bg-gray-100 text-gray-800',
            self::Kontrak => 'bg-indigo-100 text-indigo-800',
        };
    }

    public static function toArray(): array
    {
        return [
            self::PNS->value     => 'PNS',
            self::PPPK->value    => 'PPPK',
            self::GTY->value     => 'Guru Tetap',
            self::GTT->value     => 'Guru Tidak Tetap',
            self::Honorer->value => 'Honorer',
            self::Kontrak->value => 'Kontrak',
        ];
    }
}
