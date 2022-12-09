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
                'name' => 'Aji',
                'email' => 'user1' . '@gmail.com',
                'id_departemen' => '2',
                'aktif' => true,
                'level' => 'user',
                'password' => Hash::make('user'),
            ],
            [
                'id' => '2',
                'name' => 'Tri',
                'email' => 'user2' . '@gmail.com',
                'id_departemen' => '2',
                'aktif' => false,
                'level' => 'user',
                'password' => Hash::make('user'),
            ],
            [
                'id' => '3',
                'name' => 'Zidan',
                'email' => 'admin1' . '@gmail.com',
                'id_departemen' => '3',
                'aktif' => true,
                'level' => 'admin',
                'password' => Hash::make('admin'),
            ],
            [
                'id' => '4',
                'name' => 'Nurdin',
                'email' => 'admin2' . '@gmail.com',
                'id_departemen' => '3',
                'aktif' => false,
                'level' => 'admin',
                'password' => Hash::make('admin'),
            ],
            [
                'id' => '5',
                'name' => 'Rifky',
                'email' => 'superadmin1' . '@gmail.com',
                'id_departemen' => '1',
                'aktif' => true,
                'level' => 'superadmin',
                'password' => Hash::make('superadmin'),
            ],
            [
                'id' => '6',
                'name' => 'Yusuf',
                'email' => 'superadmin2' . '@gmail.com',
                'id_departemen' => '1',
                'aktif' => false,
                'level' => 'superadmin',
                'password' => Hash::make('superadmin'),
            ],
        ]);
    }
}
