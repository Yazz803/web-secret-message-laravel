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

        // Mau apa hayooo
        // User::factory(4)->create();
        $yazid = [
            'name' => "Muhammad Yazid Akbar",
            'username' => "yazz803",
            'password' => bcrypt('password'),
            'special_feature' => 1,
            'must_admin' => 1
        ];
        User::create($yazid);
        User::factory(5)->create();

        Pesan::factory(60)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
