<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(10)->create();

        $this->call(\Database\Seeders\UserSeeder::class);
        $this->call(\Database\Seeders\ConfigSeeder::class);
        $this->call(\Database\Seeders\MenuSeeder::class);
        $this->call(\Database\Seeders\PostSeeder::class);
 
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
