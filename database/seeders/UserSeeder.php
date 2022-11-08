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
                'name' => 'Tri Aji',
                'email' => 'user' . '@gmail.com',
                'divisi' => 'IT Support',
                'status' => '1',
                'level' => 'user',
                'password' => Hash::make('user'),
            ],
            [
                'name' => 'Zidan',
                'email' => 'admin' . '@gmail.com',
                'divisi' => 'IT Governance',
                'status' => '1',
                'level' => 'admin',
                'password' => Hash::make('admin'),
            ],
            [
                'name' => 'Rifky',
                'email' => 'superadmin' . '@gmail.com',
                'divisi' => 'IT',
                'status' => '1',
                'level' => 'admin',
                'password' => Hash::make('superadmin'),
            ],
        ]);
    }
}
