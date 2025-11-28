<?php

namespace App\Filament\Resources\Invitations\Schemas;

use App\Models\Invitation;

use function auth;

use Closure;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class InvitationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('')
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('email')
                            ->required()
                            ->rule(function ($record) {
                                return function ($attribute, $value, Closure $fail) use ($record): void {
                                    $exists = Invitation::where('email', $value)
                                        ->when($record, fn ($query) => $query->where('id', '!=', $record->id))
                                        ->exists();

                                    if ($exists) {
                                        $fail("Email $value sudah pernah di undang.");
                                    }
                                };
                            }),
                        Hidden::make('invited_by_id')
                            ->label('Di Undang oleh')
                            ->default(auth()->user()?->id),
                        Toggle::make('is_teacher')
                            ->label('Guru')
                            ->default(true),
                    ]),
            ]);
    }
}
