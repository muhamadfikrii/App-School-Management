<?php

namespace App\Filament\Resources\ClassRombel\Schemas;

use App\Models\Level;
use App\Models\Major;
use App\Models\Teacher;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ClassRombelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Data Kelas')
                    ->description('Lengkapi identitas Kelas')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('level_id')
                                    ->label('Tingkat')
                                    ->nullable()
                                    ->required()
                                    ->live(onBlur: true)
                                    ->options(fn () => Level::all()->pluck('name', 'id'))
                                    ->afterStateUpdated(function ($state, $set, $get): void {
                                        $level  = Level::where('id', $state)->first()?->name;
                                        $major  = Major::where('id', $get('major_id'))->first()?->name;
                                        $rombel = $get('rombel');

                                        if ($level && $major) {
                                            $set('name', "{$level} {$major} {$rombel}");
                                        }
                                    }),

                                Select::make('major_id')
                                    ->label('Jurusan')
                                    ->nullable()
                                    ->required()
                                    ->searchable()
                                    ->live(onBlur: true)
                                    ->options(fn () => Major::all()->pluck('name', 'id'))
                                    ->afterStateUpdated(function ($state, $set, $get): void {
                                        $level  = Level::where('id', $get('level_id'))->first()?->name;
                                        $major  = Major::where('id', $state)->first()?->name;
                                        $rombel = $get('rombel');

                                        if ($level && $major) {
                                            $set('name', "{$level} {$major} {$rombel}");
                                        }
                                    }),

                                Select::make('teacher_id')
                                    ->label('Wali Kelas')
                                    ->nullable()
                                    ->unique()
                                    ->searchable()
                                    ->options(Teacher::pluck('full_name', 'id')->toArray()),

                                TextInput::make('rombel')
                                    ->label('Rombel')
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(function ($state, $set, $get): void {
                                        $level = Level::where('id', $get('level_id'))->first()?->name;
                                        $major = Major::where('id', $get('major_id'))->first()?->name;

                                        if ($level && $major) {
                                            $set('name', "{$level} {$major} {$state}");
                                        }
                                    }),
                            ]),
                        TextInput::make('name')
                            ->label('Nama Kelas')
                            ->required()
                            ->unique('class_rombel')
                            ->disabled()
                            ->dehydrated()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
