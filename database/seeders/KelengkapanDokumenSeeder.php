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
                'id_surat' => '1',
                'no_dokumen' => '12',
            ],
            [
                'id_surat' => '2',
                'no_dokumen' => '12345',
            ],
            [
                'id_surat' => '3',
                'no_dokumen' => '123456',
            ],
        ]);
    }
}
