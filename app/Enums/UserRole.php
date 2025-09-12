<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMINISTRATOR = 'administrator';
    case TEACHER = 'guru';

    public function label(): string
    {
        return match ($this) {
            static::ADMINISTRATOR => 'Administrator',
            static::TEACHER => 'Teacher',
        };
    }

    public static function toArray(): array
    {
        return [
            self::ADMINISTRATOR->value => 'Administrator',
            self::TEACHER->value => 'Teacher '
        ];
    }
}
