<?php

namespace App\Filament\Resources\PointsHistoryResource\Pages;

use App\Filament\Resources\PointsHistoryResource;
use App\Models\FidelityPoint;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CreatePointsHistory extends CreateRecord
{
    protected static string $resource = PointsHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }

    protected function handleRecordCreation(array $data): Model
    {
        try {
            // Check if the FidelityPoint exists for the given client_id
            $fidelityPoint = FidelityPoint::where('client_id', $data['client_id'])->firstOrFail();

            // Use the model instance to perform increment/decrement
            if ($data['transaction_type'] == 'credit') {
                $fidelityPoint->increment('balance', $data['points']);
            } else {
                $fidelityPoint->decrement('balance', $data['points']);
            }
        } catch (ModelNotFoundException $exception) {
            // Create a new record if the client_id does not exist
            FidelityPoint::create([
                'client_id' => $data['client_id'],
                'balance' => $data['points']
            ]);
        }

        return static::getModel()::create($data);
    }
}
