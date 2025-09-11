<?php

namespace App\Filament\Resources\Invitations;

use UnitEnum;
use BackedEnum;
use App\Enums\Roles;
use App\Models\Invitation;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use App\Filament\Resources\Invitations\Pages\EditInvitation;
use App\Filament\Resources\Invitations\Pages\ViewInvitation;
use App\Filament\Resources\Invitations\Pages\ListInvitations;
use App\Filament\Resources\Invitations\Pages\CreateInvitation;
use App\Filament\Resources\Invitations\Schemas\InvitationForm;
use App\Filament\Resources\Invitations\Tables\InvitationsTable;
use App\Filament\Resources\Invitations\Schemas\InvitationInfolist;



class InvitationResource extends Resource
{
    protected static ?string $model = Invitation::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $navigationLabel = 'Invitation';
    protected static  string | UnitEnum | null $navigationGroup = 'User Manajemen';

    public static function canAccess(): bool
    {
        return auth()->user()?->hasRole(Roles::ADMINISTRATOR->value);
    }


    public static function form(Schema $schema): Schema
    {
        return InvitationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InvitationInfolist::configure($schema);
    }
    public static function table(Table $table): Table
    {
        return InvitationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInvitations::route('/'),
            // 'create' => CreateInvitation::route('/create'),
            // 'view' => ViewInvitation::route('/{record}'),
            // 'edit' => EditInvitation::route('/{record}/edit'),
        ];
    }
}
