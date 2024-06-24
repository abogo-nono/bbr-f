<?php

namespace App\Filament\Resources\FidelityPointResource\Pages;

use App\Filament\Resources\FidelityPointResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateFidelityPoint extends CreateRecord
{
    protected static string $resource = FidelityPointResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->color('success')
            ->icon('heroicon-o-arrow-path')
            ->title('Point Updated')
            ->body('The client point has been updated successfully.');
    }
}
