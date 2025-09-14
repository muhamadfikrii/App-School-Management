<?php

namespace App\Filament\Resources\Subjects\Schemas;

use App\Models\GroupSubject;
use App\Models\Subject;
use App\Models\Teacher;
use Filament\Schemas\Schema;
use App\Models\SubjectCategories;
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
                                Select::make('subject_categories_id')
                                    ->label('Kategori')
                                    ->options(GroupSubject::pluck('name', 'id')->toArray()),
                                
                                TextInput::make('name')
                                    ->label('Mata Pelajaran')
                                    ->placeholder('Contoh: Bahasa Indonesia')
                                    ->required(),
                            ]),

                        Grid::make(2)
                            ->schema([
                                    Select::make('teachers')
                                        ->label('Guru Pengajar')
                                        ->searchable()
                                        ->multiple()
                                        ->relationship('teachers', 'full_name'),

                                    TextInput::make('code')
                                        ->label('Code')
                                        ->placeholder('Contoh: B.Indo')
                                        ->required(),
                                ]),
                    ])
            ]);
    }
}
