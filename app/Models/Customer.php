<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Jika nama tabel tidak sesuai dengan konvensi, misalnya 'customers'
    protected $table = 'customers';

    // Kolom-kolom yang dapat diisi (fillable)
    protected $fillable = ['name', 'email', 'phone'];

    /**
     * Relasi one-to-many dengan Sale
     * Setiap customer dapat memiliki banyak sale (transaksi)
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
