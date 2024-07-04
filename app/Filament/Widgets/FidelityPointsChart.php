<?php

namespace App\Filament\Widgets;

use App\Models\Client;
use App\Models\FidelityPoint;
use App\Models\User;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class FidelityPointsChart extends ChartWidget
{
    protected static ?string $heading = '';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 2;

    // protected static string $color = 'info';

    protected function getData(): array
    {
        $data = [
            Trend::model(Client::class)
                ->between(
                    start: now()->startOfYear(),
                    end: now()->endOfYear(),
                )
                ->perMonth()
                ->count(),
            Trend::model(User::class)
                ->between(
                    start: now()->startOfYear(),
                    end: now()->endOfYear(),
                )
                ->perMonth()
                ->count(),
        ];

        return [
            'datasets' => [
                [
                    'label' => 'Clients',
                    'data' => $data[0]->map(fn(TrendValue $value) => $value->aggregate),
                    'tension' => 0.2,
                ],
                [
                    'label' => 'Users',
                    'data' => $data[1]->map(fn(TrendValue $value) => $value->aggregate),
                    'tension' => 0.2,
                ],
            ],
            'labels' => $data[0]->map(fn(TrendValue $value) => $value->date),
            'options' => [
                'responsive' => true,
                'scales' => [
                    'x' => '0'
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
