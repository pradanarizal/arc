<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengarsipanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengarsipan')->insert([
            [
                'id_pengarsipan' => '01',
                'no_dokumen' => '12345',
                'status_pengarsipan' => 'Pending',
                'id' => '1',

            ],
        ]);
    }
}
