<?php

namespace App\Filament\Resources\ClassRombel\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;

class ClassRombelInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->columns(1)
        ->components([
            Section::make("Data Kelas Siswa")
                ->schema([
                    Grid::make(2)->schema([
                        TextEntry::make("academic_year_id")
                        ->label('Tahun Akademik')
                        ->formatStateUsing(fn($state, $record): string => $record->academicYear ? $record->academicYear->name : '-' )
                    ]),
                    Grid::make(2)->schema([
                        TextEntry::make("name")->label("Nama Kelas"),
                        TextEntry::make('level.name')->label('Tingkat Kelas'),
                        TextEntry::make('teacher_id')->label('Wali Kelas')
                        ->formatStateUsing(fn($state, $record): string => $record->academicYear ? $record->academicYear->name : '-' ),
                    ]),
                    
                ]),
            ]);
    }
}
