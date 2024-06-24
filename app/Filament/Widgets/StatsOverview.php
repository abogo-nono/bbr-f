<?php

namespace App\Filament\Widgets;

use App\Models\Client;
use App\Models\Service;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            Stat::make('Clients', Client::count())
                ->icon('heroicon-o-user-group')
                ->description('Number of clients')
                ->descriptionIcon('')
                ->color('primary'),
            Stat::make('Service', Service::count())
                ->icon('heroicon-o-list-bullet')
                ->description('Number of services')
                ->descriptionIcon('')
                ->color('info'),
            Stat::make('User', User::count())
                ->icon('heroicon-o-users')
                ->description('Number of users')
                ->descriptionIcon('')
                ->color('warning'),
        ];
    }
}
