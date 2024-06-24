<?php

namespace App\Filament\Resources\PointsHistoryResource\Pages;

use App\Filament\Resources\PointsHistoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePointsHistory extends CreateRecord
{
    protected static string $resource = PointsHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
