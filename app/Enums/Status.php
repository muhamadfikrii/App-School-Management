<?php

namespace App\Enums;

enum Status: string
{
    case ACTIVE = 'Aktif';
    case GRADUATED = 'Lulus';
    case RELOCATED = 'Pindah';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Aktif',
            self::GRADUATED => 'Lulus',
            self::RELOCATED => 'Pindah'
        };
    }

    public static function toArray(): array
    {
        return [
            self::ACTIVE->value => 'Aktif',
            self::GRADUATED->value => 'Lulus',
            self::RELOCATED->value => 'Pindah',
        ];
    }
}
