<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Menu::create([
            'title' => __('Home'),
            'url' => '',
            'position' => 1,
            'menu_id' => 0,
            'user_id' => 1,
            'priority' => 1,
        ]);        

        \App\Models\Menu::create([
            'title' => __('About'),
            'url' => 'about',
            'position' => 1,
            'menu_id' => 0,
            'priority' => 2,
            'user_id' => 1
        ]);

        \App\Models\Menu::create([
            'title' => __('Contact'),
            'url' => 'contact',
            'position' => 1,
            'menu_id' => 0,
            'priority' => 3,
            'user_id' => 1
        ]);        

        \App\Models\Menu::create([
            'title' => __('Home'),
            'url' => '',
            'position' => 6,
            'menu_id' => 0,
            'priority' => 4,
            'user_id' => 1
        ]);        

        \App\Models\Menu::create([
            'title' => __('About'),
            'url' => 'about',
            'position' => 6,
            'menu_id' => 0,
            'priority' => 5,
            'user_id' => 1
        ]);

        \App\Models\Menu::create([
            'title' => __('Contact'),
            'url' => 'contact',
            'position' => 6,
            'menu_id' => 0,
            'priority' => 6,
            'user_id' => 1
        ]);
    }
}
