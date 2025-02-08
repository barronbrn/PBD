<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Obat extends Model
{
    //
    use HasFactory;
    protected $table = 'obat';
    protected $primaryKey = 'kode_obat';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'harga_satuan',
        'no_batch',
        'stok'
    ];
}
