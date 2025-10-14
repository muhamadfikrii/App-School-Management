<?php

namespace App\Filament\Resources\Invitations\Tables;

use App\Enums\InvitationStatus;
use App\Models\Invitation;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

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
                        ->visible(fn (Invitation $invitation) => $invitation->status !== InvitationStatus::SUCCESS)
                        ->action(function (Invitation $invitation): void {
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
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                        DeleteBulkAction::make(),
                ]),
            ]);
    }
}
