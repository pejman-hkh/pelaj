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
            'val' => __('Tiny Blog in Laravel'),
            'user_id' => 1
        ]);        

        \App\Models\Config::create([
            'key' => 'about',
            'val' => __('Tiny Blog in Laravel'),
            'user_id' => 1
        ]);  

        \App\Models\Config::create([
            'key' => 'aboutUrl',
            'val' => 'about',
            'user_id' => 1
        ]);      

        \App\Models\Config::create([
            'key' => 'siteUrl',
            'val' => 'test.com',
            'user_id' => 1
        ]);

        \App\Models\Config::create([
            'key' => 'description',
            'val' => __('This is site description'),
            'user_id' => 1
        ]);


        \App\Models\Config::create([
            'key' => 'keywords',
            'val' => __('This is site keywords, blog, free laravel cms, free blog in laravel, free opensource laravel cms'),
            'user_id' => 1
        ]);
    }
}
