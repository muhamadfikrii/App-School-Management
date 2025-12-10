<?php

namespace App\Filament\Resources\Beritas\Schemas;

use function date;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

use function strtotime;

class BeritaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Berita')
                    ->schema([
                        ImageEntry::make('image_url')
                            ->label('Gambar Berita')
                            ->disk('public')
                            ->imageHeight(200)
                            ->imageWidth(250),

                        TextEntry::make('title')
                            ->label('Judul')
                            ->size('lg')
                            ->weight('bold'),

                        TextEntry::make('excerpt')
                            ->label('Cuplikan')
                            ->columnSpanFull(),

                        TextEntry::make('published_at')
                            ->label('Tanggal Terbit')
                            ->badge()
                            ->color('success')
                            ->formatStateUsing(fn ($state) => $state ? date('d M Y H:i', strtotime($state)) : '-'),
                    ])
                    ->columns(2),

                Section::make('Konten Lengkap')
                    ->schema([
                        TextEntry::make('content')
                            ->label('')
                            ->html()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
