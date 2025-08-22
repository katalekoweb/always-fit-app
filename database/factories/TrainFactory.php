<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Train>
 */
class TrainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->word(),
            "description" => fake()->sentence(),
            "start_date" => now()->subDays(rand(1, 30)),
            "end_date" => now()->addDays(rand(1, 30)),
            "every_day" => 1,
            "active" => 1,
            "user_id" => 2,
        ];
    }
}
