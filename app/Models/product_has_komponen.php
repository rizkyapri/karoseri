<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_has_komponen extends Model
{
    use HasFactory;
    protected $table = 'product_has_komponens';
    protected $fillable = ['id_product', 'id_komponen', 'kuantitas'];
}
