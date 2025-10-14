<?php

namespace App\Filament\Resources\Teachers\Schemas;

use App\Enums\TeacherStatus;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Data Guru')
                    ->columnSpan(2)
                    ->description('Identitas lengkap guru.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('full_name')
                                    ->label('Nama Lengkap'),
                                TextInput::make('nip')
                                    ->label('NIP')
                                    ->placeholder('Contoh: 1234567890')
                                    ->numeric()
                                    ->unique(ignoreRecord: true),
                                TextInput::make('phone')
                                    ->label('Nomor Telephone')
                                    ->placeholder('Masukkan nomor telephone')
                                    ->tel(),
                                Select::make('gender')
                                    ->label('Jenis Kelamin')
                                    ->options([
                                        'Laki-Laki' => 'Laki-Laki',
                                        'Perempuan' => 'Perempuan',
                                    ]),
                                DatePicker::make('date_of_birth')
                                    ->label('Tanggal Lahir')
                                    ->native(false),
                                Select::make('status')
                                    ->label('Status')
                                    ->options(TeacherStatus::toArray()),
                                Textarea::make('address')
                                    ->label('Alamat Lengkap')
                                    ->placeholder('Masukkan alamat guru')
                                    ->rows(3)
                                    ->required()
                                    ->columnSpanFull(),
                            ]),
                    ]),
                Section::make('')
                    ->schema([
                        FileUpload::make('avatar_url')
                            ->label('Foto')
                            ->image()
                            ->imageEditor(),
                    ]),
            ]);

    }
}
