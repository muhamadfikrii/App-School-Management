<?php

namespace App\Filament\Resources\Permissions\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class PermissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')
                    ->label('Nama Permission')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Hidden::make('guard_name')
                    ->label('Guard Name')
                    ->default('web')
                    ->required(),
            ]);
    }
}
