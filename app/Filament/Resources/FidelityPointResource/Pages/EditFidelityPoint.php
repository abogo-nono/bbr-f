<?php

namespace App\Filament\Resources\FidelityPointResource\Pages;

use App\Filament\Resources\FidelityPointResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditFidelityPoint extends EditRecord
{
    protected static string $resource = FidelityPointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->color('success')
            ->icon('heroicon-o-arrow-path')
            ->title('Point Updated')
            ->body('The client point has been updated successfully.');
    }
}
