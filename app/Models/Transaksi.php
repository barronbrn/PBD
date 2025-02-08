<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    // Tentukan nama tabel secara eksplisit
    protected $table = 'transaksi';

    // Tentukan primary key komposit
    protected $primaryKey = ['no_transaksi', 'kode_obat'];
    public $incrementing = false;

    // Kolom yang bisa diisi
    protected $fillable = [
        'no_transaksi',
        'kode_obat',
        'qty',
        'selisin',
        'nilai_buku',
        'nilai_fisik',
        'selisih_nilai'
    ];

    // Relasi ke Obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'kode_obat');
    }
}
