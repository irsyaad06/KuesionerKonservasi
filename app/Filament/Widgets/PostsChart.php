<?php

namespace App\Filament\Widgets;

use App\Models\Kuesioner1;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class PostsChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Responden yang diDapat';

    public ?string $activeFilter = 'today';

    protected static ?int $sort = 1;

    protected function getData(): array
    {
        $activeFilter = $this->filter;
        $data = Trend::model(Kuesioner1::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->count()
            ;

        return [
            'datasets' => [
                [
                    'label' => 'Responden',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
