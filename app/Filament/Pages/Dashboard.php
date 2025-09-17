<?php

namespace App\Filament\Pages;

use App\Enums\UserRole;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Schemas\Components\Utilities\Get;

class Dashboard extends BaseDashboard
{
    use BaseDashboard\Concerns\HasFiltersForm;

    public function filtersForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        DatePicker::make('startDate')
                            ->maxDate(fn (Get $get) => $get('endDate') ?: now())
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->locale('id')
                            ->prefixIcon(Heroicon::CalendarDateRange),
                        DatePicker::make('endDate')
                            ->minDate(fn (Get $get) => $get('startDate') ?: now())
                            ->maxDate(now())
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->locale('id')
                            ->prefixIcon(Heroicon::CalendarDateRange),
                    ])
                    ->columns()
                    ->columnSpanFull(),
            ]);
    }
}