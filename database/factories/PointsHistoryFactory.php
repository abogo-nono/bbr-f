<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\PointsHistory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PointsHistoryFactory extends Factory
{
    protected $model = PointsHistory::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'transaction_type' => $this->faker->word(),
            'points' => $this->faker->randomNumber(),
            'transaction_date' => Carbon::now(),
            'description' => $this->faker->text(),

            'client_id' => Client::factory(),
        ];
    }
}
