<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\FidelityPoint;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FidelityPointFactory extends Factory
{
    protected $model = FidelityPoint::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'balance' => $this->faker->randomNumber(),

            'client_id' => Client::factory(),
        ];
    }
}
