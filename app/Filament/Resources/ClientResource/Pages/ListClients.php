<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use App\Models\Client;
use Carbon\Carbon;
use Filament\Actions\CreateAction;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListClients extends ListRecords
{
    protected static string $resource = ClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make()
                ->badge(Client::all()->count()),
            'This Week' => Tab::make()
                ->badge(Client::where('registration_date', '>=', Carbon::now()->startOfWeek())->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('registration_date', '>=', Carbon::now()->startOfWeek())),
            'This Month' => Tab::make()
                ->badge(Client::where('registration_date', '>=', Carbon::now()->startOfMonth())->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('registration_date', '>=', Carbon::now()->startOfMonth())),
            'Last Month' => Tab::make()
                ->badge(Client::whereBetween('registration_date', [
                    Carbon::now()->subMonth()->startOfMonth(),
                    Carbon::now()->subMonth()->endOfMonth()
                ])->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->whereBetween('registration_date', [
                    Carbon::now()->subMonth()->startOfMonth(),
                    Carbon::now()->subMonth()->endOfMonth()
                ])),
            'This Year' => Tab::make()
                ->badge(Client::where('registration_date', '>=', Carbon::now()->startOfYear())->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('registration_date', '>=', Carbon::now()->startOfYear())),
            'Last Year' => Tab::make()
                ->badge(Client::whereBetween('registration_date', [
                    Carbon::now()->subYear()->startOfYear(),
                    Carbon::now()->subYear()->endOfYear()
                ])->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->whereBetween('registration_date', [
                    Carbon::now()->subYear()->startOfYear(),
                    Carbon::now()->subYear()->endOfYear()
                ])),
        ];
    }
}
