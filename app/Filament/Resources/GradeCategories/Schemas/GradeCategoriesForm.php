<?php

namespace App\Filament\Resources\GradeCategories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class GradeCategoriesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Categories')
                ->columnSpanFull()
                        ->schema([
                            TextInput::make('name')
                                ->label('Kategori'),
                            Textarea::make('description')
                                ->label('Deskripsi')
                                ->nullable()
                        ])
            ]);
    }
}
