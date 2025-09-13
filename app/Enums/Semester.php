<?php

namespace App\Enums;

enum Semester: string
{
    case SEMESTER_GANJIL = 'Ganjil';
    case SEMESTER_GENAP = 'Genap';



    public function label(): string
    {
        return match ($this) {
            static::SEMESTER_GANJIL => 'Ganjil',
            static::SEMESTER_GENAP => 'Genap',
        };
    }

    public static function toArray(): array
    {
        return [
            self::SEMESTER_GANJIL->value => 'Ganjil',
            self::SEMESTER_GENAP->value => 'Genap '
        ];
    }

}
