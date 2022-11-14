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
                'no_dokumen' => '123',
                'nama_dokumen' => 'apa yaaa',
                'deskripsi' => 'wawawawawawawa',
                'tgl_upload' => '2050-12-25 12:10:09',
                'pemohon' => 'antooo',
            ],
        
        ]);
    }
}
