<?php

namespace App\Filament\Resources\Invitations\Tables;

use App\Models\Invitation;
use Filament\Tables\Table;
use Filament\Actions\Action;
use App\Enums\InvitationStatus;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;

class InvitationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('name'),
                TextColumn::make('email')
                    ->searchable()
                    ->label('Email'),
                TextColumn::make('status')
                    ->searchable()
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    Action::make('resend email')
                        ->label('resend email')
                        ->icon('heroicon-o-envelope')
                        ->requiresConfirmation()
                        ->visible(fn(Invitation $invitation) => $invitation->status !==  InvitationStatus::SUCCESS)
                        ->action(function(Invitation $invitation): void
                    {
                        $invitation->invite();

                        Notification::make()
                        ->success()
                        ->title('Invitation Sent')
                        ->body('Undangan telah berhasil di kirim!')
                        ->send();
                    }),

                    DeleteAction::make(),
                    ViewAction::make(),
                    EditAction::make(),
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
