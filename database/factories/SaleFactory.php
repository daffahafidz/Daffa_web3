<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => \App\Models\Customer::factory(),
            'total_price' => $this->faker->randomFloat(2, 10, 100), // Harga total antara 10 hingga 100
            'status' => $this->faker->randomElement(['pending', 'completed', 'canceled']),  // Menentukan status secara acak
        ];
    }
}
