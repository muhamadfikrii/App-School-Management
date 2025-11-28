<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\UserRole;

use function bcrypt;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => bcrypt($state))
                    ->required(fn (string $context) => $context === 'create'),
                Select::make('role_name')
                    ->options(UserRole::toArray())
                    ->label('Roles'),
            ]);
    }
}
