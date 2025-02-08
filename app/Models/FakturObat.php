<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FakturObat extends Model
{

    use HasFactory;

    protected $table = 'faktur_obat';
    public $timestamps = false;

    protected $fillable = [
        'no_faktur',
        'kode_obat',
        'jumlah',
    ];

    public function faktur()
    {
        return $this->belongsTo(Faktur::class, 'no_faktur');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'kode_obat');
    }
}


