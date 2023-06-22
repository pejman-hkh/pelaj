<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Post::create([
            'title' => __('About'),
            'url' => 'about',
            'note' => 'About text ...',
            'user_id' => 1,
            'status' => 1,
        ]);
    }
}
