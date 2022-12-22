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
                'id' => '1',
                'nik' => '1090',
                'name' => 'User',
                'username' => 'user',
                'password' => Hash::make('user'),
                'id_departemen' => '1',
                'aktif' => true,
                'level' => 'user',
            ],
            [
                'id' => '2',
                'nik' => '51822',
                'name' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'id_departemen' => '1',
                'aktif' => true,
                'level' => 'admin',
            ],
            [
                'id' => '3',
                'nik' => '82726',
                'name' => 'Superadmin',
                'username' => 'superadmin',
                'password' => Hash::make('superadmin'),
                'id_departemen' => '1',
                'aktif' => true,
                'level' => 'superadmin',
            ],
        ]);
    }
}
