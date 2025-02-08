<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'no_transaksi' => '20190501',
                'kode_obat' => 'ADROMETAB',
                'qty' => 620,
                'selisin' => 45.200,
                'nilai_buku' => 248.000,
                'nilai_fisik' => 202.800,
                'selisih_nilai' => 45.200,
            ],
            [
                'no_transaksi' => '20190501',
                'kode_obat' => 'AL-0239',
                'qty' => 229,
                'selisin' => 16.020,
                'nilai_buku' => 122.368,
                'nilai_fisik' => 106.337,
                'selisih_nilai' => 16.020,
            ],
        ];

        foreach ($data as $item) {
            Transaksi::create($item);
        }
    }
}
