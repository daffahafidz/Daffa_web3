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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();  // ID unik untuk transaksi penjualan
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');  // Relasi ke tabel customers
            $table->decimal('total_price', 8, 2);  // Total harga transaksi
            $table->enum('status', ['pending', 'completed', 'canceled']);  // Status transaksi
            $table->timestamps();  // Menyimpan waktu created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
