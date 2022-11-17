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
            ],
            [
                'id_kel_dokumen' => '02',
                'nama_kel_dokumen' => 'RAB',
            ],
            [
                'id_kel_dokumen' => '03',
                'nama_kel_dokumen' => 'File apalah gitu',
            ],
        ]);
    }
}
