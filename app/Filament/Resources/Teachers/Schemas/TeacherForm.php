<?php

namespace App\Filament\Resources\Teachers\Schemas;

use App\Enums\TeacherStatus;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
                ->columns(1)
                ->components([
                Section::make('Edit Data Guru')
                    ->description('Edit identitas lengkap guru.')
                    ->schema([

                        Grid::make(1)
                        ->schema([
                            TextInput::make('full_name')
                            ->label('Nama Lengkap')
                        ]),
                        
                        Grid::make(2)
                            ->schema([
                                TextInput::make('nip')
                                    ->label('NIP')
                                    ->placeholder('Contoh: 1234567890')
                                    ->numeric()
                                    ->unique(ignoreRecord: true),

                                TextInput::make('phone')
                                    ->label('Nomor Telephone')
                                    ->placeholder('Masukkan nomor telephone')
                                    ->tel(),
                            ]),

                        Grid::make(2)
                            ->schema([
                                Select::make('gender')
                                    ->label('Jenis Kelamin')
                                    ->options([
                                        'Laki-Laki' => 'Laki-Laki',
                                        'Perempuan' => 'Perempuan',
                                    ]),
                                DatePicker::make('date_of_birth')
                                    ->label('Tanggal Lahir')
                                    ->native(false)
                            ]),
                            Grid::make(2)
                                ->schema([
                                    Select::make('status')
                                        ->label('Jenis Kelamin')
                                        ->options(TeacherStatus::toArray()),
                                    
                                ]),
                            ]),
                        Section::make('Alamat')
                            ->description('Lengkapi informasi alamat guru.')
                            ->schema([
                                Textarea::make('address')
                                    ->label('Alamat Lengkap')
                                    ->placeholder('Masukkan alamat guru')
                                    ->rows(3)
                                    ->required()
                                    ->columnSpanFull(),
                            ]),
                            ]);
    }
}
