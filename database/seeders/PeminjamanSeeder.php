<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peminjaman')->insert([
            [
                'id_peminjaman' => '01',
                'nama_dokumen' => 'testing',
                'no_dokumen' => 'percobaan123',
                'status_peminjaman'=> 'Ya',
                'tgl_ambil'=> '2050-10-25 12:10:09',
                'tgl_kembali' => '2030-12-29 12:10:09',
                'peminjam' => 'Aguss',
            ]]);
    }
}
