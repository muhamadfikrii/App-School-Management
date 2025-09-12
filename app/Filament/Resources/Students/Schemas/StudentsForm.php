<?php

namespace App\Filament\Resources\Students\Schemas;

use App\Models\ClassRombel;
use App\Models\AcademicYear;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;

class StudentsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Data Pribadi')
                    ->description('Lengkapi identitas utama siswa.')
                    ->schema([

                        Grid::make(1)
                            ->schema([
                                Select::make('academic_year_id')
                                ->label('Tahun Akademik')
                                ->options(function () {
                                                    return AcademicYear::all()
                                                        ->mapWithKeys(fn($academicYear) => [
                                                            $academicYear->id => $academicYear->name,
                                                        ])
                                                        ->toArray();
                                                    }),
                        ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('nisn')
                                    ->label('NISN')
                                    ->placeholder('Contoh: 1234567890')
                                    ->required()
                                    ->numeric()
                                    ->minLength(9)
                                    ->maxLength(10)
                                    ->unique(ignoreRecord: true),

                                TextInput::make('full_name')
                                    ->label('Nama Lengkap')
                                    ->placeholder('Masukkan nama lengkap siswa')
                                    ->required(),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('phone')
                                    ->label('Nomor HP')
                                    ->placeholder('0812xxxxxxx')
                                    ->tel()
                                    ->required()
                                    ->maxLength(15),

                                    Select::make('status')
                                            ->label('Status SISWA')
                                            ->preload()
                                            ->options([
                                                'Aktif' => 'Aktif',
                                                'Tidak Aktif' => 'Tidak Aktif'
                                            ])

                            ]),

                        Grid::make(2)
                            ->schema([
                                Select::make('gender')
                                    ->label('Jenis Kelamin')
                                    ->required()
                                    ->options([
                                        'Laki-Laki' => 'Laki-Laki',
                                        'Perempuan' => 'Perempuan',
                                    ]),

                                DatePicker::make('year_of_entry')
                                            ->label('Tahun Masuk')
                                            ->required()
                                            ->displayFormat('d F Y')
                                            ->locale('id')
                                            ->prefixIcon(Heroicon::Calendar)
                                            ->native(false)
                            ]),

                                Select::make('classes_id')
                                        ->label('Kelas')
                                        ->options(ClassRombel::pluck('name','id'))
                                        ->default(fn () => auth()->user()?->teacher?->classes?->id)
                                        ->disabled(fn () => auth()->user()->is_teacher)
                                        ->preload()
                                        ->searchable()
                                        ->required()

                                    ]),


                        Section::make('Alamat')
                            ->description('Lengkapi informasi alamat siswa.')
                                ->schema([
                                    Textarea::make('address')
                                        ->label('Alamat Lengkap')
                                        ->placeholder('Masukkan alamat domisili siswa')
                                        ->rows(3)
                                        ->required()
                                        ->columnSpanFull(),
                                ]),
                            ]);
    }
}
