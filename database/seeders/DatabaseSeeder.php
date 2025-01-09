<?php

namespace Database\Seeders;

use App\Models\Pancake;
use App\Models\Topping;
use App\Models\Customer;
use App\Models\Size;
use App\Models\Sale;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat 10 data untuk masing-masing model
        Customer::factory(100)->create();
        Topping::factory(100)->create();
        Pancake::factory(100)->create();
        Size::factory(100)->create();
        Sale::factory(100)->create();
    }
}
