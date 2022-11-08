<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ruang')->insert([
            [
                'id_ruang' => '01',
                'nama_ruang' => 'R.01',
            ],
            [
                'id_ruang' => '02',
                'nama_ruang' => 'R.02',
            ],
            [
                'id_ruang' => '03',
                'nama_ruang' => 'R.03',
            ],
        ]);

    }
}
