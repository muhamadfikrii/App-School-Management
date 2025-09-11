<?php

namespace App\Enums;

enum Semester: string
{
    case SEMESTER_GANJIL = 'Semester Ganjil';
    case SEMESTER_GENAP = 'Semester Genap';

    

    public function label(): string
    {
        return match ($this) {
            static::SEMESTER_GANJIL => 'Semester Ganjil',
            static::SEMESTER_GENAP => 'Semester Genap',
        };
    }

    public static function toArray(): array 
    {
        return [
            self::SEMESTER_GANJIL->value => 'Semester Ganjil',
            self::SEMESTER_GENAP->value => 'Semester Genap '
        ];
    }

}