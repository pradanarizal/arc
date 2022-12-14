<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        DB::table('users')->insert([
            [
                'id' => '1131211',
                'nik' => '10211190',
                'name' => 'User',
                'username' => 'user.cda',
                'password' => Hash::make('user'),
                'id_departemen' => '1',
                'aktif' => true,
                'level' => 'user',
            ],
            [
                'id' => '212132',
                'nik' => '518211122',
                'name' => 'Admin',
                'username' => 'admin.cda',
                'password' => Hash::make('admin'),
                'id_departemen' => '1',
                'aktif' => true,
                'level' => 'admin',
            ],
            [
                'id' => '191972',
                'nik' => '827221116',
                'name' => 'Superadmin',
                'username' => 'superadmin.cda',
                'password' => Hash::make('superadmin'),
                'id_departemen' => '1',
                'aktif' => true,
                'level' => 'superadmin',
            ],
        ]);
    }
}
