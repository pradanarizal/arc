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
                'nama_kel_dokumen' => 'ITSR',
            ],
            [
                'nama_kel_dokumen' => 'RAB',
            ],
            [
                'nama_kel_dokumen' => 'Proposal',
            ],
            [
                'nama_kel_dokumen' => '',
            ],
        ]);
    }
}
