<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;

class TeacherInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make("Data Guru")
                ->schema([
                    Grid::make(2)->schema([
                        TextEntry::make("user.name")
                            ->label('Nama'),
                        TextEntry::make('date_of_birth')
                            ->label('Tanggal Lahir'),
                        TextEntry::make('address')
                            ->label('Alamat'),
                        TextEntry::make("phone")
                            ->label("Nomor Telepon"),
                        TextEntry::make('nip')
                            ->label('NIP'),
                        TextEntry::make('status')
                            ->label('Status'),
                        TextEntry::make('gender')
                            ->label('Jenis Kelamin')
                    ]),
                    
                ]),
                Section::make("Data Tambahan")
                ->schema([
                    Grid::make(2)->schema([
                        TextEntry::make('classes.teacher.user.name')
                            ->label('Wali Kelas'),
                        TextEntry::make('classes.academicYear.name')
                            ->label('Tahun Ajaran')
                        
                    ]),           
                ])
                ]);
    }
}
