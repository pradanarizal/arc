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
                'nama_kel_dokumen' => 'Surat Keluar / Surat Eksternal / Surat Internal',
            ],
            [
                'nama_kel_dokumen' => 'Peraturan Direksi',
            ],
            [
                'nama_kel_dokumen' => 'Keputusan Direksi',
            ],
            [
                'nama_kel_dokumen' => 'Nota Dinas Internal',
            ],
            [
                'nama_kel_dokumen' => 'Surat Edaran Direksi',
            ],
            [
                'nama_kel_dokumen' => 'Instruksi Direksi',
            ],
            [
                'nama_kel_dokumen' => 'Maklumat Direksi',
            ],
            [
                'nama_kel_dokumen' => 'Justifikasi',
            ],
            [
                'nama_kel_dokumen' => 'NPD / PR',
            ],
            [
                'nama_kel_dokumen' => 'G61',
            ],
            [
                'nama_kel_dokumen' => 'A9',
            ],
            [
                'nama_kel_dokumen' => 'Invoice / Tagihan / Kuitansi',
            ],
            [
                'nama_kel_dokumen' => 'Kontrak / Perjanjian / SPK / SPR',
            ],
        ]);
    }
}
