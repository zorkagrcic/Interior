<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Interior']);
        Category::create(['name' => 'Furniture']);
        Category::create(['name' => 'Decoration']);
        Category::create(['name' => 'Lighting']);
        Category::create(['name' => 'Small Spaces']);
        Category::create(['name' => 'Inspiration']);



    }
}
