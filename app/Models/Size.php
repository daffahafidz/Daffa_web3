<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    // Jika nama tabel tidak sesuai dengan konvensi, misalnya 'sizes'
    protected $table = 'sizes';

    // Kolom-kolom yang dapat diisi (fillable)
    protected $fillable = ['name', 'description'];

    /**
     * Relasi many-to-many dengan Pancake
     * Setiap size dapat terkait dengan banyak pancake
     */
    public function pancakes()
    {
        return $this->belongsToMany(Pancake::class, 'pancake_size', 'size_id', 'pancake_id');
    }
}
