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
                'nama_ruang' => 'Ruang 001',
            ],
            [
                'nama_ruang' => 'Ruang 002',
            ],
            [
                'nama_ruang' => 'Ruang 003',
            ],
        ]);

    }
}
