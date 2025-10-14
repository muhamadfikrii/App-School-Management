<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ActiveStudentsChart extends ChartWidget
{
    protected ?string $heading = 'Jumlah Siswa Aktif';

    protected static ?int $sort = 2;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        // Hardcode labels per bulan
        $labels = [
            'Jan 2025',
            'Feb 2025',
            'Mar 2025',
            'Apr 2025',
            'May 2025',
            'Jun 2025',
            'Jul 2025',
            'Ags 2025',
            'Sep 2025',
            'Okt 2025',
            'Nov 2025',
            'Des 2025',
        ];

        // Hardcode jumlah siswa aktif per bulan
        $data = [
            200,
            130,
            125,
            300,
            175,
            145,
            230,
            250,
            265,
            179,
            189,
            200,
        ];

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Siswa Aktif',
                    'data' => $data,
                    'fill' => false,
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',

                    'tension' => 0.3,
                ],
            ],
        ];
    }
}
