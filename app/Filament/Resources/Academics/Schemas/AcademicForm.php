<?php

namespace App\Filament\Resources\Academics\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class AcademicForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 TextInput::make('name')
                    ->required()
                    ->label('Tahun Akademik'),
            ]);
    }
}
