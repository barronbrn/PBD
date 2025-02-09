<?php

namespace Database\Seeders;

use App\Models\JenisObat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['satuan' => 'TABLET'],
            ['satuan' => 'PCS'],
            ['satuan' => 'BOTOL'],
            ['satuan' => 'AMPUL'],
            ['satuan' => 'CAPSUL'],
            ['satuan' => 'VIAL'],
            ['satuan' => 'TUBE'],
        ];

        foreach ($data as $item) {
            JenisObat::create($item);
        }
    }
}
