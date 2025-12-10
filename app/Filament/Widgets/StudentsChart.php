<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class StudentsChart extends ChartWidget
{
    protected ?string $heading = 'Rata-rata Nilai Siswa';

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

        // Hardcode rata-rata nilai siswa per bulan
        $data = [
            85.5,
            78.2,
            82.1,
            88.7,
            79.3,
            84.6,
            81.9,
            87.4,
            83.2,
            86.1,
            80.5,
            89.0,
        ];

        return [
            'labels'   => $labels,
            'datasets' => [
                [
                    'label'           => 'Nilai',
                    'data'            => $data,
                    'fill'            => 'start',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor'     => 'rgba(54, 162, 235, 1)',
                    'tension'         => 0.4,
                ],
            ],
        ];
    }
}
