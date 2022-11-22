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
                'no_dokumen' => '1',
                'status_pengarsipan' => 'Pending',
                'id' => '1',
            ],
            [
                'no_dokumen' => '1234572',
                'status_pengarsipan' => 'Ya',
                'id' => '2',
            ],
            [
                'no_dokumen' => '3',
                'status_pengarsipan' => 'Tidak',
                'id' => '3',
            ],
        ]);
    }
}
