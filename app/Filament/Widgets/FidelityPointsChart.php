<?php

namespace App\Filament\Widgets;

use App\Models\FidelityPoint;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class FidelityPointsChart extends ChartWidget
{
    protected static ?string $heading = 'Fidelity Points';

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = Trend::model(FidelityPoint::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Fidelity Points',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
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
