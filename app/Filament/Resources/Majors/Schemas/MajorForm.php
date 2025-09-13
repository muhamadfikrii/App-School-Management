<?php

namespace App\Filament\Resources\Majors\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class MajorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make("")
                    ->schema([
                        TextInput::make('name')
                           ->required()
                           ->label('Nama Jurusan'),
                    ])
            ]);
    }
}
