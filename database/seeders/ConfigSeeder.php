<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Config::create([
            'key' => 'mainTitle',
            'val' => 'Tiny Blog in Laravel',
            'user_id' => 1
        ]);        

        \App\Models\Config::create([
            'key' => 'about',
            'val' => 'Tiny Blog in Laravel',
            'user_id' => 1
        ]);
    }
}
