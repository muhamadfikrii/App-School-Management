<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Grade;
use Carbon\Carbon;

class StudentsChart extends ChartWidget
{
    protected ?string $heading = 'Rata-rata Nilai Siswa';
    protected static ?int $sort = 2;

    public ?string $startDate = null;
    public ?string $endDate = null;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $start = $this->startDate ? Carbon::parse($this->startDate) : now()->startOfYear();
        $end = $this->endDate ? Carbon::parse($this->endDate) : now()->endOfYear();

        $monthsRange = [];
        $labels = [];
        $current = $start->copy();
        while ($current <= $end) {
            $monthsRange[] = $current->month;
            $labels[] = $current->format('M');
            $current->addMonth();
        }

        $monthlyAverage = Grade::query()
            ->whereBetween('created_at', [$start, $end])
            ->selectRaw('MONTH(created_at) as month, AVG(score) as avg_score')
            ->groupBy('month')
            ->pluck('avg_score', 'month');

        $data = [];
        foreach ($monthsRange as $month) {
            $data[] = round($monthlyAverage[$month] ?? 0, 2);
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Nilai',
                    'data' => $data,
                    'fill' => 'start',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'tension' => 0.4,
                ],
            ],
        ];
    }
}

