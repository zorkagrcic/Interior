<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::create([
            'content' => 'This looks amazing! I really love the clean design.',
            'user_id' => 1,
            'post_id' => 1,
        ]);

        Comment::create([
            'content' => 'Great ideas, I will definitely try this in my home.',
            'user_id' => 1,
            'post_id' => 1,
        ]);
        Comment::create([
            'content' => 'Very inspiring post, thanks for sharing!',
            'user_id' => 1,
            'post_id' => 2,
        ]);
    }
}
