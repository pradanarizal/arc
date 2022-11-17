<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelengkapanDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelengkapan_dokumen')->insert([
            [
                'id_kel_dokumen' => '01',
                'nama_kel_dokumen' => 'ITSR',
                'no_dokumen' => '12345',
            ],
            [
                'id_kel_dokumen' => '02',
                'nama_kel_dokumen' => 'RAB',
                'no_dokumen' => '123456',
            ],
            [
                'id_kel_dokumen' => '03',
                'nama_kel_dokumen' => 'File apalah gitu',
                'no_dokumen' => '1234567',
            ],
        ]);
    }
}
