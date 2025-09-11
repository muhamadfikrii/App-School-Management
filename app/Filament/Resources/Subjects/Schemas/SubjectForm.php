<?php

namespace App\Filament\Resources\Subjects\Schemas;

use App\Models\Teacher;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class SubjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make("Data Mata Pelajaran")
                    ->columnSpanFull()
                    ->label('Mata Pelajaran')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Mata Pelajaran')
                                    ->placeholder('Contoh: Bahasa Indonesia')
                                    ->required(),

                                TextInput::make('code')
                                    ->label('Code')
                                    ->placeholder('Contoh: B.Indo')
                                    ->required(),
                            ]),

                        Grid::make(2)
                            ->schema([
                                Select::make('teachers')
                                    ->label('Guru Pengajar')
                                    ->searchable()
                                    ->required()
                                    ->multiple()
                                    ->relationship('teachers', 'full_name'),
                            ]),

                    ])
            ]);
    }
}
