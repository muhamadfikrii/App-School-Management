<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\Students\RelationManagers\GradeRelationManager;

class StudentsInfolist
{

public static function configure(Schema $schema): Schema
{
    return $schema
        ->columns(1)
        ->components([
            Section::make("Data Pribadi")
                ->schema([
                    Grid::make(2)->schema([
                        TextEntry::make("academic_year_id")
                        ->label('Tahun Akademik')
                        ->formatStateUsing(fn($state, $record): string => $record->academicYear ? $record->academicYear->name : '-' )
                    ]),
                    Grid::make(2)->schema([
                        TextEntry::make("nisn")->label("NISN"),
                        TextEntry::make("full_name")->label("Nama Lengkap"),
                    ]),
                    Grid::make(2)->schema([
                        TextEntry::make("date_of_birth")
                            ->label("Tanggal Lahir")
                            ->date('d M Y'),
                        TextEntry::make("gender")
                            ->label("Jenis Kelamin"),
                    ]),
                    Grid::make(2)->schema([
                        TextEntry::make("phone")->label("Nomor HP"),
                        
                        TextEntry::make("status")
                            ->label("Status Siswa")
                            ->columnSpanFull(),
                    ]),
                ]),

            Section::make("Kelas")
                ->schema([
                        TextEntry::make("classRombel.name")
                            ->label("Kelas")
                            ->formatStateUsing(fn($state, $record) => $record->classRombel ?        $record->classRombel->name
                                : 'Belum ada kelas' )
                            ->columnSpanFull(),
                        TextEntry::make("year_enrollment")
                            ->label("Tahun Masuk"),


                    
                ]),

            Section::make("Alamat")
                ->schema([
                    TextEntry::make("address")
                        ->label("Alamat Lengkap")
                        ->columnSpanFull(),
                ]),
        ]);
}

}