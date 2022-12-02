<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rak')->insert([
            [
                'nama_rak' => '001',
                'id_ruang' => '1'
            ],
            [
                'nama_rak' => '002',
                'id_ruang' => '2'
            ],
            [
                'nama_rak' => '003',
                'id_ruang' => '3'
            ],
        ]);
    }
}
