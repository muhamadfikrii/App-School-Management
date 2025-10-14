<?php

namespace App\Filament\Resources\ClassRombel\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ClassRombelInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Kelas')
                    ->columnSpan(2)
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Nama Kelas'),
                                TextEntry::make('teacher_id')
                                    ->label('Wali Kelas')
                                    ->formatStateUsing(fn ($state, $record): string => $record->teacher ? $record->teacher->full_name : '-'),
                                TextEntry::make('level.name')
                                    ->label('Tingkat Kelas'),
                                TextEntry::make('major.name')
                                    ->label('Jurusan'),
                            ]),
                    ]),
                Section::make()
                    ->schema([
                        ImageEntry::make('teacher.avatar_url'),
                    ]),
            ]);
    }
}
