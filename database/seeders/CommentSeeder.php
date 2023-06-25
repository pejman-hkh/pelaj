<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Comment::create([
            'name' => __('Test'),
            'email' => 'test@test.test',
            'note' => __('About text ...'),
            'answer' => '',
            'user_id' => 1,
            'post_id' => 1,
            'status' => 1,
        ]);
    }
}
