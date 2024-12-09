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
                'description' => 'a genre of fiction that includes magical and supernatural things'
            ],
            [
                'name' => 'horror',
                'description' => 'a genre designed to fear into the reader'
            ],
            [
                'name' => 'mystery',
                'description' => 'a genre of fiction where a central character often solves a crime'
            ],
            [
                'name' => 'crime',
                'description' => 'a genre of fiction/non fiction that involves an act of crime'
            ],
            [
                'name' => 'biography',
                'description' => 'a genre of non-fiction about the life story of a real person'
            ],
        ]);
    }
}
