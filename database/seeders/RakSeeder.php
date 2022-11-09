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
                'id_rak' => '01',
                'nama_rak' => '001',
            ],
            [
                'id_rak' => '02',
                'nama_rak' => '002',
            ],
            [
                'id_rak' => '03',
                'nama_rak' => '003',
            ],
        ]);
    }
}
