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
                'name' => 'Admin',
                'level' => 'admin',
                'email' => 'admin' . '@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'User',
                'level' => 'user',
                'email' => 'user' . '@gmail.com',
                'password' => Hash::make('321'),
            ],
            [
                'name' => 'Super Admin',
                'level' => 'superadmin',
                'email' => 'superadmin' . '@gmail.com',
                'password' => Hash::make('111'),
            ],
        ]);
    }
}
