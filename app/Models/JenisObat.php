<?php

namespace App\Models;

use App\Models\Obat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisObat extends Model
{
    use HasFactory;
    protected $table = 'jenis_obat'; // Tentukan nama tabel
    protected $primaryKey = 'id'; // Tentukan primary key
    public $incrementing = true; // Aktifkan auto-increment
    protected $keyType = 'int'; // Tentukan tipe data primary key

    protected $fillable = [
        'satuan' // Kolom yang bisa diisi
    ];

    // Relasi ke Obat
    public function obat()
    {
        return $this->hasMany(Obat::class, 'id_jenis_obat');
    }
}
