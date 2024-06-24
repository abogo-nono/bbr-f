<?php

namespace App\Filament\Resources\FidelityPointResource\Pages;

use App\Filament\Resources\FidelityPointResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFidelityPoints extends ListRecords
{
    protected static string $resource = FidelityPointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
