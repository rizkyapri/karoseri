<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komponen extends Model
{
    use HasFactory;

    protected $table = 'komponen';
    protected $fillable = [
        'name',
        'quantity',
        'price',
    ];

    // Relasi ke Produk melalui tabel pivot
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_has_komponens', 'id_komponen', 'id_product');
    }
}
