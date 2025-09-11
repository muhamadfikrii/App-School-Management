<?php

namespace App\Enums;

enum Roles: string
{
    case ADMINISTRATOR = 'administrator';
    case GURU = 'guru';

    public function label(): string
    {
        return match ($this) {
            static::ADMINISTRATOR => 'Administrator',
            static::GURU => 'Guru',
        };
    }

    public static function toArray(): array 
    {
        return [
            self::ADMINISTRATOR->value => 'Administrator',
            self::GURU->value => 'Guru '
        ];
    }
}