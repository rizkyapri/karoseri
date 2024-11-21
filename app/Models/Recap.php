<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recap extends Model
{
    use HasFactory;

    protected $table = 'recaps';

    protected $fillable = [
        'id_product',
        'id_supplier',
        'id_incoming',
        'id_outcoming',
        'phone',
        'top',
        'keterangan',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

    public function incoming()
    {
        return $this->belongsTo(Incoming::class, 'id_incoming');
    }

    public function outcoming()
    {
        return $this->belongsTo(Outcoming::class, 'id_outcoming');
    }

    
}
