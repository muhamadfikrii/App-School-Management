<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class RegistrationStudentsChart extends ChartWidget
{
    protected ?string $heading = 'Jumlah Pendaftar per Tahun Akademik';

    protected static ?int $sort = 2;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $labels = [
            '2020/2021',
            '2021/2022',
            '2022/2023',
            '2023/2024',
            '2024/2025',
        ];

        $data = [
            700,
            600,
            650,
            750,
            768,
        ];

        return [
            'labels'   => $labels,
            'datasets' => [
                [
                    'label'           => 'Pendaftar',
                    'data'            => $data,
                    'fill'            => false,
                    'borderColor'     => 'rgba(255, 159, 64, 1)',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'tension'         => 0.3,
                ],
            ],
        ];
    }
}
