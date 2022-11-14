<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengembalianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengembalian')->insert([
            [
                'id_pengembalian' => '01',
                'no_dokumen' => '123',
                'nama_dokumen' => 'apa yaaa',
                'tgl_ambil' => '2050-12-25 12:10:09',
                'tgl_kembali' => '2050-12-25 12:10:09',
                'tgl_pengembalian' => '2050-12-25 12:10:09',
                'peminjam' => 'antooo'
            ],

        ]);
    }
}
