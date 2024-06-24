<?php

namespace App\Filament\Resources\PointsHistoryResource\Pages;

use App\Filament\Resources\PointsHistoryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditPointsHistory extends EditRecord
{
    protected static string $resource = PointsHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
