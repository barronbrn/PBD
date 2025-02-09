<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi'; // Tentukan nama tabel
    protected $primaryKey = ['no_transaksi', 'kode_obat']; // Tentukan primary key komposit
    public $incrementing = false; // Non-aktifkan auto-increment

    protected $fillable = [
        'no_transaksi',
        'kode_obat',
        'qty',
        'selisih',
        'nilai_buku',
        'nilai_fisik',
        'selisih_nilai'
    ];

    // Relasi ke Obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'kode_obat');
    }

    public function getKeyName()
    {
        return 'no_transaksi'; // Laravel hanya bisa menangani satu primary key
    }
}
