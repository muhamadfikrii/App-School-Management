<?php

namespace App\Filament\Resources\SubjectCategories\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class SubjectCategoriesForm
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
