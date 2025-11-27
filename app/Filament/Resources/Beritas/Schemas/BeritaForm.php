<?php

namespace App\Filament\Resources\Beritas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul')
                    ->required(),

                Textarea::make('excerpt')
                    ->label('Kutipan'),

                RichEditor::make('content')
                    ->label('Konten')
                    ->required(),

                FileUpload::make('image_url')
                    ->label('Gambar Berita')
                    ->disk('public')
                    ->directory('beritas')
                    ->visibility('public')
                    ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg', 'image/webp'])
                    ->maxSize(5024)
                    ->imageEditorViewportWidth('1920')
                    ->imageEditorViewportHeight('2000')
                    ->required(),
            ]);
    }
}
