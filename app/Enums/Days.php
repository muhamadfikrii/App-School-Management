<?php

namespace App\Enums;

enum Days: string
{
    case SENIN  = 'Senin';
    case SELASA = 'Selasa';
    case RABU   = 'Rabu';
    case KAMIS  = 'Kamis';
    case JUMAT  = 'Jum\'at';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SENIN  => 'Senin',
            self::SELASA => 'Selasa',
            self::RABU   => 'Rabu',
            self::KAMIS  => 'Kamis',
            self::JUMAT  => 'Jum\'at',
        };
    }

    public static function toArray(): array
    {
        return [
            self::SENIN->value  => 'Senin',
            self::SELASA->value => 'Selasa',
            self::RABU->value   => 'Rabu',
            self::KAMIS->value  => 'Kamis',
            self::JUMAT->value  => 'Jum\'at',
        ];
    }
}
