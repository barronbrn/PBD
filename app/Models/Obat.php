<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Obat extends Model
{

    use HasFactory;
    // Tentukan nama tabel secara eksplisit
    protected $table = 'obat';

    // Tentukan primary key
    protected $primaryKey = 'kode';
    public $incrementing = false;
    protected $keyType = 'string';

    // Kolom yang bisa diisi
    protected $fillable = [
        'kode',
        'obat',
        'fiskk',
        'nama_obat',
        'id_jenis_obat',
        'harga_pokok',
        'stock'
    ];

    // Relasi ke JenisObat
    public function jenisObat()
    {
        return $this->belongsTo(JenisObat::class, 'id_jenis_obat');
    }

}
