<?php

namespace App\Filament\Resources\Invitations\Schemas;

use App\Models\Invitation;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

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
                            ->rule(function ($record){
                                return function ($attribute, $value, \Closure $fail)  use ($record) {
                                    $exists = Invitation::where('email', $value)
                                                        ->when($record, fn($query) => $query->where('id', '!=', $record->id))
                                                        ->exists();

                                    if($exists){
                                        $fail("Email $value sudah pernah di undang.");
                                    }
                                };
                            }),
                        Hidden::make('invited_by_id')
                            ->label('Di Undang oleh')
                            ->default(auth()->user()?->id),
                        Toggle::make('is_teacher')
                            ->label('Guru')
                            ->default(true)
                    ]),
    ]);

                
    }
}
