<?php

namespace App\Filament\Resources\Achievements\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AchievementInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Detail Prestasi')
                ->description('Menampilkan informasi lengkap tentang prestasi yang diraih oleh siswa.')
                ->schema([
                    Grid::make(2)->schema([
                        TextEntry::make('title')
                            ->label('Judul Prestasi')
                            ->weight('bold')
                            ->color('primary'),

                        TextEntry::make('level')
                            ->label('Tingkat Kompetisi')
                            ->badge()
                            ->color('info'),
                    ]),

                    Grid::make(2)->schema([
                        TextEntry::make('student.full_name')
                            ->label('Nama Siswa')
                            ->icon('heroicon-o-user')
                            ->placeholder('-'),

                        TextEntry::make('date')
                            ->label('Tanggal Prestasi')
                            ->date('d F Y')
                            ->icon('heroicon-o-calendar'),
                    ]),

                    TextEntry::make('description')
                        ->label('Deskripsi')
                        ->columnSpanFull()
                        ->markdown()
                        ->placeholder('Tidak ada deskripsi.'),
                ]),

            Section::make('Dokumentasi Prestasi')
                ->schema([
                    ImageEntry::make('photo')
                        ->label('Foto Prestasi')
                        ->imageHeight(300)
                        ->disk('public')
                        ->visibility('public')
                        ->imageWidth('100%')
                        ->columnSpanFull()
                        ->extraAttributes(['class' => 'rounded-xl shadow-md']),
                ]),
        ]);
    }
}
