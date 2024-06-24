<?php

namespace App\Filament\Resources\PointsHistoryResource\Pages;

use App\Filament\Resources\PointsHistoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPointsHistories extends ListRecords
{
    protected static string $resource = PointsHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
