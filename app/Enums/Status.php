<?php

namespace App\Enums;

enum Status: string
{
    case ACTIVE = 'Aktif';
    case GRADUATED = 'Lulus';
    case RELOCATED = 'Relocated';



    public function label(): string
    {
        return match ($this) {
            static::ACTIVE => 'Aktif',
            static::GRADUATED => 'Lulus',
            static::RELOCATED => 'Pindah'
        };
    }

    public static function toArray(): array
    {
        return [
            self::ACTIVE->value => 'Aktif',
            self::GRADUATED->value => 'Lulus',
            self::RELOCATED->value => 'Pindah'
        ];
    }

}
