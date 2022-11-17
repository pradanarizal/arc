<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RetensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('retensi')->insert([
            [
                'id_retensi' => '01',
                'no_dokumen' => '12345',
                'tgl_retensi' => '2050-12-25',
                'id' => '2',
                'status_retensi' => 'Pending'
            ],

        ]);
    }
}
