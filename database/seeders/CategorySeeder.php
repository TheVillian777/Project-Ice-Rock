<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'fantasy',
                'description' => 'a genre of fiction that includes magical and supernatural things',
                'img_url' => 'fantasy.png'
            ],
            [
                'name' => 'non-fiction',
                'description' => '',
                'img_url' => 'non-fiction.png'
            ],
            [
                'name' => 'mystery',
                'description' => 'a genre of fiction where a central character often solves a crime',
                'img_url' => 'mystery.png'
            ],
            [
                'name' => 'fiction',
                'description' => 'a genre of fiction/non fiction that involves an act of crime',
                'img_url' => 'fiction.png'
            ],
            [
                'name' => 'science-fiction',
                'description' => 'a genre of non-fiction about the life story of a real person',
                'img_url' => 'science-fiction.png'
            ],
        ]);
    }
}
