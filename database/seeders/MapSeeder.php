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
                'id_map' => '01',
                'nama_map' => '0001',
            ],
            [
                'id_map' => '02',
                'nama_map' => '0002',
            ],
            [
                'id_map' => '03',
                'nama_map' => '0003',
            ],
        ]);
    }
}
