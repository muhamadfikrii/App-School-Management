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
                        TextEntry::make("nisn")->label("NISN"),
                        TextEntry::make("full_name")->label("Nama Lengkap"),
                        TextEntry::make("date_of_birth")
                            ->label("Tanggal Lahir")
                            ->date('d M Y'),
                        TextEntry::make("gender")
                            ->label("Jenis Kelamin"),
                                TextEntry::make("classRombel.name")
                            ->label("Kelas")
                            ->formatStateUsing(fn($state, $record) => $record->classRombel ?        $record->classRombel->name
                                : 'Belum ada kelas' ),
                        TextEntry::make("year_enrollment")
                            ->label("Tahun Masuk"),
                        TextEntry::make("phone")->label("Nomor HP"),
                        TextEntry::make("status")
                            ->label("Status Siswa")
                        
                    ]),
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