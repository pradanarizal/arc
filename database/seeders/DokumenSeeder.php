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
                'no_dokumen' => '1',
                'status_dokumen' => 'Pending',
                'divisi' => 'IT Support',
                'nama_dokumen' => 'ITSR',
                'tahun_dokumen' => '2019',
                'deskripsi' => 'ITSR Website BAST',
                'tgl_upload' => \Carbon\Carbon::now(),
                'id_ruang' => '03',
                'id_rak' => '03',
                'id_box' => '03',
                'id_map' => '03',
                'nama_kel_dokumen' => 'PENGANTAR',
                'file_dokumen' => '',
                'created_at' => \Carbon\Carbon::now(),
            ],
            [
                'no_dokumen' => '2',
                'status_dokumen' => 'Pending',
                'divisi' => 'IT Operation',
                'nama_dokumen' => 'ITSR C-ad',
                'tahun_dokumen' => '2019',
                'deskripsi' => 'Retensi Dokumen Lama',
                'tgl_upload' => \Carbon\Carbon::now(),
                'id_ruang' => '02',
                'id_rak' => '02',
                'id_box' => '02',
                'id_map' => '02',
                'nama_kel_dokumen' => 'ITSR',
                'file_dokumen' => '',
                'created_at' => \Carbon\Carbon::now(),
            ],
            [
                'no_dokumen' => '3',
                'status_dokumen' => 'Pengarsipan',
                'divisi' => 'IT Dokumen',
                'nama_dokumen' => 'Commuter',
                'tahun_dokumen' => '2020',
                'deskripsi' => 'Peminjaman Dokumen Penting',
                'tgl_upload' => \Carbon\Carbon::now(),
                'id_ruang' => '01',
                'id_rak' => '01',
                'id_box' => '01',
                'id_map' => '01',
                'nama_kel_dokumen' => 'RAB',
                'file_dokumen' => '',
                'created_at' => \Carbon\Carbon::now(),
            ],
            [
                'no_dokumen' => '4',
                'status_dokumen' => 'Pengarsipan',
                'divisi' => 'IT Komersial',
                'nama_dokumen' => 'ITSR Arsip',
                'tahun_dokumen' => '2017',
                'deskripsi' => 'ini Dokumen Penting',
                'tgl_upload' => \Carbon\Carbon::now(),
                'id_ruang' => '02',
                'id_rak' => '02',
                'id_box' => '02',
                'id_map' => '02',
                'nama_kel_dokumen' => 'RAB, ITSR',
                'file_dokumen' => '',
                'created_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
