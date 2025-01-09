<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Tambahkan ini
use Illuminate\Database\Eloquent\Model;

class Pancake extends Model
{
    use HasFactory;  // Gunakan trait HasFactory

    // Jika nama tabel tidak sesuai dengan konvensi, misalnya 'pancakes'
    protected $table = 'pancakes';

    // Kolom-kolom yang dapat diisi (fillable)
    protected $fillable = ['name', 'price', 'stock'];

    /**
     * Relasi many-to-many dengan Topping
     */
    public function toppings()
    {
        return $this->belongsToMany(Topping::class, 'pancake_topping', 'pancake_id', 'topping_id');
    }

    /**
     * Relasi many-to-many dengan Sale
     */
    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'sale_pancake', 'pancake_id', 'sale_id')
                    ->withPivot('quantity');  // Menambahkan kolom quantity di pivot
    }
}
