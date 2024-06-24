<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'first_name' => $this->faker->firstName(),
            'first_name_slug' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'last_name_slug' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'avatar' => $this->faker->word(),
            'registration_date' => Carbon::now(),
        ];
    }
}
