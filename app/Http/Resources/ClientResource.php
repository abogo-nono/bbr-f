<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Client */
class ClientResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'first_name' => $this->first_name,
            'first_name_slug' => $this->first_name_slug,
            'last_name' => $this->last_name,
            'last_name_slug' => $this->last_name_slug,
            'email' => $this->email,
            'phone' => $this->phone,
            'avatar' => $this->avatar,
            'registration_date' => $this->registration_date,
        ];
    }
}
