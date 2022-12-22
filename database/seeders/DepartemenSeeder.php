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
            ['kode_departemen' => 'All', 'nama_departemen' => ' Semua Divisi'],
            ['kode_departemen' => 'CFA', 'nama_departemen' => ' Budgeting and Accounting '],
            ['kode_departemen' => 'CUL', 'nama_departemen' => ' GRC and Legal '],
            ['kode_departemen' => 'CFF', 'nama_departemen' => ' FINANCIAL ADMINISTRATION TEAM '],
            ['kode_departemen' => 'CFP', 'nama_departemen' => ' PSO & TAC PLANNING & MANAGEMENT DEPT '],
            ['kode_departemen' => 'CUG', 'nama_departemen' => ' Logistic '],
            ['kode_departemen' => 'CUP', 'nama_departemen' => ' Strategic Planning '],
            ['kode_departemen' => 'COC', 'nama_departemen' => ' Commercial '],
            ['kode_departemen' => 'CTP', 'nama_departemen' => ' Pelaksana Tugas Maintenance Planning and Evaluation '],
            ['kode_departemen' => 'COH', 'nama_departemen' => ' Pelaksana Tugas Train Services Facilities and Customer Care '],
            ['kode_departemen' => 'CFH', 'nama_departemen' => ' Human Capital '],
            ['kode_departemen' => 'COT', 'nama_departemen' => ' Train Operation '],
            ['kode_departemen' => 'CUI', 'nama_departemen' => ' Internal Audit '],
            ['kode_departemen' => 'CTS', 'nama_departemen' => ' Infrastructure '],
            ['kode_departemen' => 'CUS', 'nama_departemen' => ' Corporate Secretary '],
            ['kode_departemen' => 'CTI', 'nama_departemen' => ' Information Technology '],
        ]);
    }
}
