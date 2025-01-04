<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = [];
    protected $fillable = [
        'kode_produk',
        'name',
        'quantity',
        'unit',
        'price',
    ];

    public function incoming()
    {
        return $this->hasMany(Incoming::class);
    }
    public function outcoming()
    {
        return $this->hasMany(outcoming::class);
    }
    public function recap()
    {
        return $this->hasMany(recap::class);
    }

    // Relasi ke Komponen melalui tabel pivot
    public function components()
    {
        return $this->belongsToMany(Komponen::class, 'product_has_komponens', 'id_product', 'id_komponen')
            ->withPivot('kuantitas')
            ->withTimestamps();
    }
}
