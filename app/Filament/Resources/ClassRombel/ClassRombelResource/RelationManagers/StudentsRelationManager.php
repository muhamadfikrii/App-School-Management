<?php

namespace App\Filament\Resources\ClassRombel\ClassRombelResource\RelationManagers;

use Filament\Tables\Table;
use Filament\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\Students\StudentsResource;
use Filament\Resources\RelationManagers\RelationManager;

class StudentsRelationManager extends RelationManager
{
    protected static string $relationship = 'student';

    protected static ?string $relatedResource = StudentsResource::class;
}
