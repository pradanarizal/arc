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
                'id_kel_dokumen' => '1',
                'nama_kel_dokumen' => 'Surat Keluar / Surat Eksternal / Surat Internal',
            ],
            [
                'id_kel_dokumen' => '2',
                'nama_kel_dokumen' => 'Peraturan Direksi',
            ],
            [
                'id_kel_dokumen' => '3',
                'nama_kel_dokumen' => 'Keputusan Direksi',
            ],
            [
                'id_kel_dokumen' => '4',
                'nama_kel_dokumen' => 'Nota Dinas Internal',
            ],
            [
                'id_kel_dokumen' => '5',
                'nama_kel_dokumen' => 'Surat Edaran Direksi',
            ],
            [
                'id_kel_dokumen' => '6',
                'nama_kel_dokumen' => 'Instruksi Direksi',
            ],
            [
                'id_kel_dokumen' => '7',
                'nama_kel_dokumen' => 'Maklumat Direksi',
            ],
            [
                'id_kel_dokumen' => '8',
                'nama_kel_dokumen' => 'Justifikasi',
            ],
            [
                'id_kel_dokumen' => '9',
                'nama_kel_dokumen' => 'NPD / PR',
            ],
            [
                'id_kel_dokumen' => '10',
                'nama_kel_dokumen' => 'G61',
            ],
            [
                'id_kel_dokumen' => '11',
                'nama_kel_dokumen' => 'A9',
            ],
            [
                'id_kel_dokumen' => '12',
                'nama_kel_dokumen' => 'Invoice / Tagihan / Kuitansi',
            ],
            [
                'id_kel_dokumen' => '13',
                'nama_kel_dokumen' => 'Kontrak / Perjanjian / SPK / SPR',
            ],
        ]);
    }
}
