<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'kode' => 'ADROMETAB',
                'nama_obat' => 'ADROME TABLET @',
                'id_jenis_obat' => 1, // ID Jenis Obat untuk TABLET
                'harga_pokok' => 400.00,
                'stock' => 113,
            ],
            [
                'kode' => 'AL-0239',
                'nama_obat' => 'SPUIT 1 CC ONEMED @',
                'id_jenis_obat' => 2, // ID Jenis Obat untuk PCS
                'harga_pokok' => 534.36,
                'stock' => 30,
            ],
            [
                'kode' => 'ALK-1383-DIS',
                'nama_obat' => 'SPUTI 3 CC ONEMED @',
                'id_jenis_obat' => 2, // ID Jenis Obat untuk PCS
                'harga_pokok' => 1066.54,
                'stock' => 192,
            ],
            [
                'kode' => 'ALK-1384-DIS',
                'nama_obat' => 'SPUTI 5 CC ONEMED @',
                'id_jenis_obat' => 2, // ID Jenis Obat untuk PCS
                'harga_pokok' => 1303.42,
                'stock' => 5,
            ],
            [
                'kode' => 'ALK-1455-DIS',
                'nama_obat' => 'URINE BAG @',
                'id_jenis_obat' => 2, // ID Jenis Obat untuk PCS
                'harga_pokok' => 2917.71,
                'stock' => 0,
            ],
            [
                'kode' => 'CALC TAB',
                'nama_obat' => 'CALCII LACTATE TAB @',
                'id_jenis_obat' => 1, // ID Jenis Obat untuk PCS
                'harga_pokok' => 47,
                'stock' => 1080,
            ],
        ];

        foreach ($data as $item) {
            Obat::create($item);
        }
    }
}
