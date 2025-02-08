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
                'obat' => 'ADROME TABLET @',
                'fiskk' => 'Fiskk',
                'nama_obat' => 'ADROME TABLET',
                'id_jenis_obat' => 1, // ID Jenis Obat untuk TABLET
                'harga_pokok' => 400.00,
                'stock' => 113,
            ],
            [
                'kode' => 'AL-0239',
                'obat' => 'SPUTI 1CCONEMED@',
                'fiskk' => 'Fiskk',
                'nama_obat' => 'SPUTI 1CCONEMED',
                'id_jenis_obat' => 2, // ID Jenis Obat untuk PCS
                'harga_pokok' => 534.36,
                'stock' => 30,
            ],
            [
                'kode' => 'ALK-1383-DIS',
                'obat' => 'SPUTI 3CCONEMED@',
                'fiskk' => 'Fiskk',
                'nama_obat' => 'SPUTI 3CCONEMED',
                'id_jenis_obat' => 2, // ID Jenis Obat untuk PCS
                'harga_pokok' => 1066.54,
                'stock' => 192,
            ],
        ];

        foreach ($data as $item) {
            Obat::create($item);
        }
    }
}
