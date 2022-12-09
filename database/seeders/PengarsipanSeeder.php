<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengarsipanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengarsipan')->insert([
            [
                'id_pengarsipan' => '1',
                'no_dokumen' => '2', // No dokumen yang Status Dokumennya Pengarsipan
                'status_pengarsipan' => 'Pending',
                'id' => '1',
                'created_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
