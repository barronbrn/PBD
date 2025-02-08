<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisObat extends Model
{
    //
    // Tentukan nama tabel secara eksplisit
    protected $table = 'jenis_obat';

    protected $fillable = [
        'satuan',
    ];
}
