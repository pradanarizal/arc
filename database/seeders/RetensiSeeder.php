<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RetensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('retensi')->insert([
            [
                'id_retensi' => '1',
                'no_dokumen' => '1',
                'id' => '2',
                'status_retensi' => 'Pending',
                'created_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
