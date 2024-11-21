<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outcoming extends Model
{
    use HasFactory;

    protected $table = 'outcomings';

    protected $fillable = [
        'id_product',
        'creator_id',
        'updater_id',
        'unit',
        'purchase_date',
        'kode',
        'bagian',
        'no_spk',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updater_id');
    }
    public function recap()
    {
        return $this->hasMany(recap::class);
    }
}
