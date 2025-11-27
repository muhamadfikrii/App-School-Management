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
