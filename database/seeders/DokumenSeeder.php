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
                'status_dokumen' => 'Tersedia',
                'divisi' => 'IT Support',
                'nama_dokumen'=>'ITSR',
                'tahun_dokumen'=>'2019',
                'deskripsi'=>'ITSR Website BAST',
                'tgl_upload' => '2022-12-25',
                'id_ruang' => '03',
                'id_rak' => '03',
                'id_box' => '03',
                'id_map' => '03',
            ],
            [
                'no_dokumen' => '123456',
                'status_dokumen' => 'Retensi',
                'divisi' => 'IT Operation',
                'nama_dokumen'=>'oke oke',
                'tahun_dokumen'=>'2119',
                'deskripsi'=>'Retensi Dokumen Lama',
                'tgl_upload'=>'2022-12-25',
                'id_ruang' => '02',
                'id_rak' => '02',
                'id_box' => '02',
                'id_map' => '02',
            ],
            [
                'no_dokumen' => '1234567',
                'status_dokumen' => 'Dipinjam',
                'divisi' => 'IT Dokumen',
                'nama_dokumen'=>'ITSR C-Ad',
                'tahun_dokumen'=>'1119',
                'deskripsi'=>'Peminjaman Dokumen Penting',
                'tgl_upload'=>'2022-12-25',
                'id_ruang' => '01',
                'id_rak' => '01',
                'id_box' => '01',
                'id_map' => '01',
            ],
            [
                'no_dokumen' => '12',
                'status_dokumen' => 'Pengarsipan',
                'divisi' => 'IT Komersial',
                'nama_dokumen'=>'ITSR Arsip',
                'tahun_dokumen'=>'2019',
                'deskripsi'=>'ini Dokumen Penting',
                'tgl_upload'=>'2020-02-15',
                'id_ruang' => '02',
                'id_rak' => '02',
                'id_box' => '02',
                'id_map' => '02',
            ],
        ]);
    }
}
