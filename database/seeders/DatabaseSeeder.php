<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pesan;

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
        // \App\Models\User::factory(10)->create();
        User::factory()->create([
            'name' => 'Muhammad Yazid Akbar',
            'username' => 'yazz803',
            'password' => bcrypt('password')
        ]);

        User::factory(4)->create();

        // Pesan::factory(30)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}