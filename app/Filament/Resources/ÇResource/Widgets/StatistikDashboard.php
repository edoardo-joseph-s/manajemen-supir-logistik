<?php

namespace App\Filament\Resources\ÇResource\Widgets;

use Filament\Widgets\ChartWidget;

class StatistikDashboard extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
