<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_surat')->insert([
            [
                'nama_surat' => 'ITSR',
            ],
            [
                'nama_surat' => 'RAB',
            ],
            [
                'nama_surat' => 'Proposal',
            ],
        ]);
    }
}
