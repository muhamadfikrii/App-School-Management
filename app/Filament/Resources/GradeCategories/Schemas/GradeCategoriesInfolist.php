<?php

namespace App\Filament\Resources\GradeCategories\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;

class GradeCategoriesInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make("")
                ->columnSpanFull()
                ->schema([
                    Grid::make(2)->schema([
                        TextEntry::make("name")
                            ->label('Kategori'),
                        TextEntry::make('description')
                            ->label('Deksripsi'),

                    ]),
                ])
            ]);
    }
}
