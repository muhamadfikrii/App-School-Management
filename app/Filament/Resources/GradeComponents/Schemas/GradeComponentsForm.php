<?php

namespace App\Filament\Resources\GradeComponents\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GradeComponentsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('')
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nilai')
                                    ->required(),
                                TextInput::make('weight')
                                    ->label('Bobot')
                                    ->dehydrateStateUsing(fn ($state) => $state / 100)
                                    ->formatStateUsing(fn ($state) => $state * 100)
                                    ->required(),
                            ]),
                    ]),
            ]);
    }
}
