<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RuangSeeder::class);
        $this->call(RakSeeder::class);
        $this->call(BoxSeeder::class);
        $this->call(MapSeeder::class);
        $this->call(DokumenSeeder::class);
        $this->call(KelengkapanDokumenSeeder::class);
        $this->call(PeminjamanSeeder::class);
        $this->call(PengarsipanSeeder::class);
        $this->call(PengembalianSeeder::class);
        $this->call(RetensiSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
