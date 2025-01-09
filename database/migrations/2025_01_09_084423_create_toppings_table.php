<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('toppings', function (Blueprint $table) {
            $table->id();  // ID unik untuk setiap topping
            $table->string('name');  // Nama topping (misal: Chocolate, Strawberry)
            $table->decimal('price', 8, 2);  // Harga topping (misal: 5.00)
            $table->timestamps();  // Menyimpan waktu created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toppings');
    }
};
