<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Faktur extends Model
{
    //

    use HasFactory;
    protected $table = 'faktur';
    protected $primaryKey = 'no_faktur';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'no_faktur',
        'tanggal_faktur',
        'pelanggan_id'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

}
