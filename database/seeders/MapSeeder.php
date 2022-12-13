<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('map')->insert([
            [
                'nama_map' => 'Map 1',
                'id_box' => '1',
                'id_rak' => '1',
                'id_ruang' => '1'
            ],
            [
                'nama_map' => 'Map 2',
                'id_box' => '2',
                'id_rak' => '2',
                'id_ruang' => '2'
            ],
            [
                'nama_map' => 'Map 3',
                'id_box' => '3',
                'id_rak' => '3',
                'id_ruang' => '3'
            ],
        ]);
    }
}
