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
                'nama_box' => 'Box 001',
                'id_rak' => '1'
            ],
            [
                'nama_box' => 'Box 002',
                'id_rak' => '2'
            ],
            [
                'nama_box' => 'Box 003',
                'id_rak' => '3'
            ],
        ]);
    }
}
