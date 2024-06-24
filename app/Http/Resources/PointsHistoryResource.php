<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\PointsHistory */
class PointsHistoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'transaction_type' => $this->transaction_type,
            'points' => $this->points,
            'transaction_date' => $this->transaction_date,
            'description' => $this->description,

            'client_id' => $this->client_id,

            'client' => new ClientResource($this->whenLoaded('client')),
        ];
    }
}
