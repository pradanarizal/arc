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
                'no_dokumen' => '12',
                'status_pengarsipan' => 'Pending',
                'id' => '1',
                'created_at' => \Carbon\Carbon::now(),
            ],
            [
                'no_dokumen' => '123456',
                'status_pengarsipan' => 'Ya',
                'id' => '2',
                'created_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
