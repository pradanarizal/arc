<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departemen')->insert([
            [
                'kode_departemen' => 'CTI',
                'nama_departemen' => 'Information Technology'
            ],
            [
                'kode_departemen' => 'COC',
                'nama_departemen' => 'Commercial'
            ],
        ]);

    }
}
