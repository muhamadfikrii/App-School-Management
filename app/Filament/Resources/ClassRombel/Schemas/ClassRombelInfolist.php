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
                Section::make("Kelas")
                    ->schema([
                        Grid::make(4)
                            ->schema([
                                TextEntry::make("name")
                                    ->label("Nama Kelas"),
                                TextEntry::make('teacher_id')
                                    ->label('Wali Kelas')
                                    ->formatStateUsing(fn($state, $record): string => $record->teacher ? $record->teacher->full_name : '-' ),
                                TextEntry::make('level.name')
                                    ->label('Tingkat Kelas'),
                                TextEntry::make('major.name')
                                    ->label('Jurusan'),
                        ]),
                    ]),
                ]);
    }
}
