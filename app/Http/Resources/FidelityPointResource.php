<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\FidelityPoint */
class FidelityPointResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'balance' => $this->balance,

            'client_id' => $this->client_id,

            'client' => new ClientResource($this->whenLoaded('client')),
        ];
    }
}
