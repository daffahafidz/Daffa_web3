<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SizeFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Small', 'Medium', 'Large']),
            'price_multiplier' => $this->faker->randomFloat(2, 1, 2), // Faktor pengali antara 1-2
        ];
    }
}
