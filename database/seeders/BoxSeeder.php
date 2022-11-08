<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('box')->insert([
            [
                'id_box' => '01',
                'nama_box' => '001',
            ],
            [
                'id_box' => '02',
                'nama_box' => '002',
            ],
            [
                'id_box' => '03',
                'nama_box' => '003',
            ],
        ]);
    }
}
