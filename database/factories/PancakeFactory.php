<?php

namespace Database\Factories;

use App\Models\Pancake;
use Illuminate\Database\Eloquent\Factories\Factory;

class PancakeFactory extends Factory
{
    protected $model = Pancake::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),  // Nama pancake acak (misalnya: Pancake1)
            'price' => $this->faker->randomFloat(2, 5, 50),  // Harga antara 5 hingga 50, dua angka desimal
            'stock' => $this->faker->numberBetween(10, 100),  // Stok antara 10 hingga 100
        ];
    }
}
