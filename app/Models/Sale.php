<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Tambahkan ini
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;  // Gunakan trait HasFactory

    // Jika nama tabel tidak sesuai dengan konvensi, misalnya 'sales'
    protected $table = 'sales';

    // Kolom-kolom yang dapat diisi (fillable)
    protected $fillable = ['customer_id', 'total_price', 'status'];

    /**
     * Relasi one-to-many dengan Customer
     * Setiap sale (penjualan) dimiliki oleh satu customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Relasi many-to-many dengan Pancake
     * Setiap sale dapat memiliki banyak pancake
     */
    public function pancakes()
    {
        return $this->belongsToMany(Pancake::class, 'sale_pancake', 'sale_id', 'pancake_id')
                    ->withPivot('quantity');  // Menambahkan kolom quantity di pivot
    }

    /**
     * Relasi many-to-many dengan Topping
     * Setiap sale dapat memiliki banyak topping
     */
    public function toppings()
    {
        return $this->belongsToMany(Topping::class, 'sale_topping', 'sale_id', 'topping_id');
    }
}
