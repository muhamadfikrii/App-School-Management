<?php

namespace App\Filament\Resources\Roles\Schemas;

use App\Enums\Roles;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;


class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
                ->schema([
                Select::make('name')
                    ->label('Role')
                    ->options(Roles::toArray())
                    ->required(),
                
                Hidden::make('guard_name')
                    ->label('Guard Name')
                    ->default('web')
                    ->required(),

            ]);
    }
}
