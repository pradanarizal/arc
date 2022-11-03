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
                'password' => Hash::make('admin'),
            ],
            [
                'name' => 'User',
                'level' => 'user',
                'email' => 'user' . '@gmail.com',
                'password' => Hash::make('user'),
            ],
        ]);
        // User::Create(
        //     [
        //         [
        //             'name' => 'Admin',
        //             'level' => 'admin',
        //             'email' => 'admin@gmail.com',
        //             'password' => bcrypt('admin'),
        //             'remember_token' => Str::random(60),

        //             'name' => 'User',
        //             'level' => 'user',
        //             'email' => 'user@gmail.com',
        //             'password' => bcrypt('user'),
        //             'remember_token' => Str::random(60),
        //         ]
        //     ]
        // );
    }
}
