<?php

namespace App\Filament\Resources\Teachers\Schemas;

use function auth;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeacherInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Data Guru')
                    ->columnSpan(2)
                    ->description('Informasi identitas lengkap guru.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('full_name')->label('Nama Lengkap'),
                                TextEntry::make('nip')->label('NIP'),
                                TextEntry::make('phone')
                                    ->visible(function ($record) {
                                        $user = auth()->user();

                                        return $user->is_admin || ($user->is_teacher && $user->teacher->id === $record->id);
                                    })
                                    ->label('Nomor Telepon'),
                                TextEntry::make('gender')->label('Jenis Kelamin'),
                                TextEntry::make('date_of_birth')->label('Tanggal Lahir')
                                    ->date()
                                    ->visible(function ($record) {
                                        $user = auth()->user();

                                        return $user->is_admin || ($user->is_teacher && $user->teacher->id === $record->id);
                                    }),
                                TextEntry::make('status')->label('Status'),
                                TextEntry::make('address')->label('Alamat Lengkap')
                                    ->visible(function ($record) {
                                        $user = auth()->user();

                                        return $user->is_admin || ($user->is_teacher && $user->teacher->id === $record->id);
                                    })
                                    ->columnSpanFull(),
                                TextEntry::make('created_at')->label('Dibuat Pada')->dateTime(),
                                TextEntry::make('updated_at')->label('Diperbarui Pada')->dateTime(),
                            ]),
                    ]),

                Section::make('Foto Guru')
                    ->columnSpan(1)
                    ->schema([
                        ImageEntry::make('avatar_url')
                            ->label('Foto')
                            ->height(150)
                            ->width(150),
                    ])
                    ->visible(function ($record) {
                        $user = auth()->user();

                        return $user->is_admin || ($user->is_teacher && $user->teacher->id === $record->id);
                    }),
            ]);
    }
}
