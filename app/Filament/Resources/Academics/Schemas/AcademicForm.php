<?php

namespace App\Filament\Resources\Academics\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class AcademicForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make("")
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->label('Tahun Akademik'),
                    ])
            ]);
    }
}
