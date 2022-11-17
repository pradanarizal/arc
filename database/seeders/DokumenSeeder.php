<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dokumen')->insert([
            [
                'no_dokumen' => '12345',
                'status_dokumen' => 'Retensi',
                'divisi' => 'IT Support',
                'nama_dokumen'=>'ITSR',
                'tahun_dokumen'=>'2019',
                'deskripsi'=>'ITSR Website BAST',
                'tgl_upload' => '2022-12-25 12:10:09',
                'id_ruang' => '',
                'id_rak' => '',
                'id_box' => '',
                'id_map' => '',
            ],
            [
                'no_dokumen' => '123456',
                'status_dokumen' => 'Retensi',
                'divisi' => 'IT Operation',
                'nama_dokumen'=>'oke oke',
                'tahun_dokumen'=>'2119',
                'deskripsi'=>'Retensi Dokumen Lama',
                'tgl_upload'=>'2022-12-25 12:10:09',
                'id_ruang' => '',
                'id_rak' => '',
                'id_box' => '',
                'id_map' => '',
            ],
            [
                'no_dokumen' => '1234578',
                'status_dokumen' => 'Dipinjam',
                'divisi' => 'IT Dokumen',
                'nama_dokumen'=>'ITSR C-Ad',
                'tahun_dokumen'=>'1119',
                'deskripsi'=>'Peminjaman Dokumen Penting',
                'tgl_upload'=>'2022-12-25 12:10:09',
                'id_ruang' => '',
                'id_rak' => '',
                'id_box' => '',
                'id_map' => '',
            ],
        ]);
    }
}
