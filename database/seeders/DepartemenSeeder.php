<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departemen')->insert([
            ['kode_departemen' => 'CFA', 'nama_departemen' => ' Budgeting and Accounting Vice President'],
            ['kode_departemen' => 'CUL', 'nama_departemen' => ' GRC and Legal Vice President'],
            ['kode_departemen' => 'CFF', 'nama_departemen' => ' Finance Vice President'],
            ['kode_departemen' => 'CFP', 'nama_departemen' => ' PSO and TAC Vice President'],
            ['kode_departemen' => 'CUG', 'nama_departemen' => ' Logistic Vice President'],
            ['kode_departemen' => 'CUP', 'nama_departemen' => ' Strategic Planning Vice President'],
            ['kode_departemen' => 'COC', 'nama_departemen' => ' Commercial Vice President'],
            ['kode_departemen' => 'CTP', 'nama_departemen' => ' Pelaksana Tugas Maintenance Planning and Evaluation Vice President'],
            ['kode_departemen' => 'COH', 'nama_departemen' => ' Pelaksana Tugas Train Services Facilities and Customer Care Vice President'],
            ['kode_departemen' => 'CFH', 'nama_departemen' => ' Human Capital Vice President'],
            ['kode_departemen' => 'COT', 'nama_departemen' => ' Train Operation Vice President'],
            ['kode_departemen' => 'CUI', 'nama_departemen' => ' Internal Audit Vice President'],
            ['kode_departemen' => 'CTS', 'nama_departemen' => ' Infrastructure Vice President'],
            ['kode_departemen' => 'CUS', 'nama_departemen' => ' Corporate Secretary Vice President'],
            ['kode_departemen' => 'CTI', 'nama_departemen' => ' Information Technology Vice President'],

        ]);
    }
}
