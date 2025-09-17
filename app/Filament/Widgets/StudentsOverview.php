<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Major;
use App\Models\Student;
use App\Models\Teacher;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class StudentsOverview extends StatsOverviewWidget
{
    use InteractsWithPageFilters;     
    protected static ?int $sort = 1;

    protected function getFilters(): ?array
    {
        return [
            'startDate' => now()->subMonth()->toDateString(),
            'endDate' => now()->toDateString(),
        ];
    }
    protected function getStats(): array
    { 

        $start = isset($this->pageFilters['startDate']) 
            ? Carbon::parse(time: $this->pageFilters['startDate'])->startOfDay() 
            : now()->subMonth()->startOfDay();

        $end = isset($this->pageFilters['endDate']) 
            ? Carbon::parse($this->pageFilters['endDate'])->endOfDay() 
                : now()->endOfDay();


        $studentsInRange = Student::when($start, fn($query) => $query->where('created_at', '>=', $start))
                                    ->when($end, fn($query) => $query->where('created_at', '<=', $end))
                                    ->count();

        $teachersInRange = Teacher::when($start, fn($query) => $query->where('created_at', '>=', $start))
                                    ->when($end, fn($query) => $query->where('created_at', '<=', $end))
                                    ->count();

        $MajorsInRange   = Major::when($start, fn($query)=> $query->where('created_at', '>=', $start))
                                ->when($end, fn($query) => $query->where('created_at', '<=', $end))
                                ->count();


        return [
            Stat::make('Total Siswa',  $studentsInRange)
            ->color('success')
            ->description("Dari " . $start->format('d M Y') . " sampai " . $end->format('d M Y'))
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17]),

            Stat::make('Total Guru', $teachersInRange)
            ->color('info')
            ->description("Dari " . $start->format('d M Y') . " sampai " . $end->format('d M Y'))
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17]),

            Stat::make('Total Jurusan',$MajorsInRange)
            ->description("Dari" . $start->format(' d M Y') . " sampai " . $end->format('d M Y'))
            ->descriptionIcon('heroicon-o-chevron-double-right')
            ->color('warning')
            ->chart([7, 2, 10, 3, 15, 4, 17]),
        ];
    }
    protected function getType(): string
    {
        return 'line';
    }
}
