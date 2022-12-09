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

            ],
            [
                'nama_map' => 'Map 2',
                'id_box' => '2',
            ],
            [
                'nama_map' => 'Map 3',
                'id_box' => '3',

            ],
        ]);
    }
}
