<?php

namespace App\Filament\Resources\GroupSubject\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class GroupSubjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make("")
                    ->columnSpanFull()
                            ->schema([
                                TextInput::make('name')
                                    ->label('Kategori')
                                    ->required(),

                                Textarea::make('description')
                                    ->label('Deksripsi')
                                    ->nullable()
                            ]),
            ]);
    }
}
