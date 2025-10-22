<?php

namespace App\Filament\Resources\Achievements\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AchievementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            // 🏅 Informasi Prestasi
            Section::make('Informasi Prestasi')
                ->description('Isi data detail prestasi yang diraih oleh siswa.')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('title')
                            ->label('Judul Prestasi')
                            ->placeholder('Contoh: Juara 1 Lomba Web Design')
                            ->required()
                            ->maxLength(255),

                        Select::make('student_id')
                            ->label('Nama Siswa')
                            ->relationship('student', 'full_name')
                            ->searchable()
                            ->required(),
                    ]),

                    Grid::make(2)->schema([
                        TextInput::make('level')
                            ->label('Tingkat Kompetisi')
                            ->default('Sekolah')
                            ->required()
                            ->placeholder('Kabupaten / Provinsi / Nasional'),

                        DatePicker::make('date')
                            ->label('Tanggal Prestasi')
                            ->native(false)
                            ->displayFormat('d M Y')
                            ->placeholder('Pilih tanggal prestasi'),

                        TextInput::make('achievement_type')
                            ->label('Jenis Prestasi')
                            ->placeholder('Akademik / Non-Akademik')
                            ->hidden(fn () => true),
                    ]),

                    Textarea::make('description')
                        ->label('Deskripsi Prestasi')
                        ->placeholder('Tuliskan detail atau cerita singkat tentang prestasi yang diraih.')
                        ->rows(4)
                        ->nullable()
                        ->columnSpanFull(),
                ]),

            Section::make('Dokumentasi')
                ->description('Unggah foto atau bukti pendukung prestasi.')
                ->schema([
                    FileUpload::make('photo')
                        ->label('Foto Prestasi')
                        ->image()
                        ->disk('public')
                        ->directory('achievements')
                        ->visibility('public')
                        ->imageEditor()
                        ->maxSize(2048)
                        ->hint('Ukuran maksimal 2MB, format: JPG, PNG, atau WebP.'),
                ]),
        ]);
    }
}
