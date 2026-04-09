<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Minimalist Living Room Ideas',
            'content' => 'Creating a minimalist living room is not about having less, but about making space for what truly matters. Soft neutral tones, natural light, and carefully selected furniture can completely transform the atmosphere of your home. Focus on clean lines and avoid unnecessary decorations. A single plant, a textured rug, or a statement chair can bring warmth without clutter. Minimalism is not empty — it is intentional.',
            'image' => 'blog-thumb-01.jpg',
            'user_id' => 1,
            'category_id' => 5,
        ]);

        Post::create([
            'title' => 'How to Make Your Home Feel Cozy',
            'content' => 'A cozy home is created through small details that make a big difference. Warm lighting, soft blankets, and natural materials like wood and cotton can instantly change the feeling of a space. Try layering textures and adding personal touches such as books, candles, or framed memories. Comfort is not about luxury — it is about feeling relaxed and safe in your own space.',
            'image' => 'blog-thumb-02.jpg',
            'user_id' => 2,
            'category_id' => 6,

        ]);

        Post::create([
            'title' => 'Bringing Nature Indoors',
            'content' => 'Plants have a unique ability to bring life into any room. Whether it is a small cactus on your desk or large leafy plants in the corner, greenery creates a calming and refreshing environment. Natural elements improve both the aesthetic and the mood of your home. Start small and let your space grow with you.',
            'image' => 'blog-thumb-03.jpg',
            'user_id' => 1,
            'category_id' => 3,

        ]);

        Post::create([
            'title' => 'Small Space, Big Style',
            'content' => 'Living in a small space does not mean compromising on style. With smart organization and multifunctional furniture, every corner can be both practical and beautiful. Use mirrors to create the illusion of space, choose light colors, and keep the layout simple. The key is balance between function and aesthetics.',
            'image' => 'blog-thumb-04.jpg',
            'user_id' => 1,
            'category_id' => 5,

        ]);
    }
}
