<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apoteker extends Model
{

    use HasFactory;

    protected $table = 'apoteker';
    protected $primaryKey = 'id_apoteker';
    public $incrementing = true;

    protected $fillable = [
        'nama_apoteker',
        'alamat_apoteker',
        'no_telepon',
    ];

}
