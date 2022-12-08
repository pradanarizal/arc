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
                'name' => 'Tri Aji',
                'email' => 'user' . '@gmail.com',
                'id_departemen' => '2',
                'status_user' => 'Aktif',
                'level' => 'user',
                'password' => Hash::make('user'),
            ],
            [
                'id' => '2',
                'name' => 'Zidan',
                'email' => 'admin' . '@gmail.com',
                'id_departemen' => '3',
                'status_user' => 'Aktif',
                'level' => 'admin',
                'password' => Hash::make('admin'),
            ],
            [
                'id' => '3',
                'name' => 'Rifky',
                'email' => 'superadmin' . '@gmail.com',
                'id_departemen' => '1',
                'status_user' => 'Aktif',
                'level' => 'superadmin',
                'password' => Hash::make('superadmin'),
            ],
        ]);
    }
}
