<?php

namespace App\Filament\Resources\Majors\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class MajorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 TextInput::make('name')
                    ->required()
                    ->label('Nama Jurusan'),
            ]);
    }
}
