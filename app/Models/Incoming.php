<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incoming extends Model
{
    use HasFactory;

    protected $table = 'incomings';

    protected $fillable = [
        'id_product',
        'id_supplier',
        'creator_id',
        'updater_id',
        'kode_penerimaan',
        'unit',
        'kuantitas',
        'keterangan',
        'start_date',
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

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

    public function recap()
    {
        return $this->hasMany(recap::class);
    }
}
