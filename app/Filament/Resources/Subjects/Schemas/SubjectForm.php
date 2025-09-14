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
                                Select::make('group_subject_id')
                                    ->label('Kategori')
                                    ->options(GroupSubject::pluck('name', 'id')->toArray()),

                                Select::make('teachers')
                                    ->label('Guru Pengajar')
                                    ->searchable()
                                    ->multiple()
                                    ->relationship('teachers', 'full_name'),
                            ]),

                        Grid::make(4)
                            ->schema([
                                    TextInput::make('code')
                                        ->label('Code')
                                        ->placeholder('Contoh: B.Indo')
                                        ->required(),
                                    TextInput::make('name')
                                        ->label('Mata Pelajaran')
                                        ->columnSpan(2)
                                        ->placeholder('Contoh: Bahasa Indonesia')
                                        ->required(),
                                     TextInput::make('kkm')
                                        ->label('KKM')
                                        ->placeholder('Contoh: 75')
                                        ->required(),
                                ]),
                    ])
            ]);
    }
}
