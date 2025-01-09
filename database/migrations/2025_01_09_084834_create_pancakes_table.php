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
        Schema::create('pancakes', function (Blueprint $table) {
            $table->id();  // ID unik untuk pancake
            $table->string('name');  // Nama pancake
            $table->decimal('price', 8, 2);  // Harga pancake
            $table->integer('stock');  // Stok pancake yang tersedia
            $table->timestamps();  // Menyimpan waktu created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pancakes');
    }
};
