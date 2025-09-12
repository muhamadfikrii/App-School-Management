<?php

namespace App\Filament\Resources\GradeComponents\Schemas;

use App\Models\GradeCategories;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use PhpParser\Node\Stmt\Label;

class GradeComponentsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make("")
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(2)
                        ->schema([
                            Select::make('grades_categories_id')
                                ->options(GradeCategories::pluck('name', 'id')->toArray())
                                ->label('Kategori'),

                            TextInput::make('name')
                                ->label('Nilai')
                                ->required(),

                            TextInput::make('weight')
                                ->label('Bobot')
                                ->dehydrateStateUsing(fn ($state)=> $state / 100)
                                ->formatStateUsing(fn ($state) => $state * 100)
                                ->required(),
                            ]),
                    ])
            ]);
    }
}
