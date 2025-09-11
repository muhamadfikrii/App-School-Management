<?php

namespace App\Filament\Resources\Levels\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class LevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 Section::make("")
                    ->columnSpanFull()
                    ->schema([
                 TextInput::make('name')
                    ->required()
                    ->label('Tingkat'),
                    ])
            ]);
    }
}
