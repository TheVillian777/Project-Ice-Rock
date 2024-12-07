<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use Illuminate\Support\Facades\DB;


class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('author')->insert([
            [
                'first_name' => 'Lyman',
                'last_name' => 'Frank Baum',
                'biography' => 'Author and Novelist',
                'date_of_birth' => '1856/05/15'
            ],
            
            [
                'first_name' => 'Robert',
                'last_name' => 'Louis Stevenson',
                'biography' => 'Author and Novelist',
                'date_of_birth' => '1856/05/15'
            ],

            [
                'first_name' => 'Agatha',
                'last_name' => 'Christie',
                'biography' => 'Author',
                'date_of_birth' => '1890/09/15'
            ],

            [
                'first_name' => 'Boris',
                'last_name' => 'Johnson',
                'biography' => 'Author',
                'date_of_birth' => '1964/06/19'
            ],

        ]);
    }
}
