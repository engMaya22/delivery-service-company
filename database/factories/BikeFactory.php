<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bike>
 */
class BikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
    
            'type' => fake()->realText($maxNbChars = 10, $indexSize = 2),
            'number' => rand(1,100),
            'status' => rand(0,1),
            'description' => fake()->realText($maxNbChars = 20, $indexSize = 2),

        ];
    }
}
