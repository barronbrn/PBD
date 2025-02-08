<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{

    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'no_faktur',
        'harga_satuan',
        'diskon',
        'subtotal',
        'total',
        'ppn',
    ];

    public function faktur()
    {
        return $this->belongsTo(Faktur::class, 'no_faktur');
    }
}



