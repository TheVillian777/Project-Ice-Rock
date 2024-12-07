<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book')->insert([
            [
             'author_id' => '1',
             'category_id' => '1',
             'book_name' => 'The Wizard of Oz',
             'isbn' => '978150435',
             'book_price' => '6.95',
             'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
             'published_date' => '1993/02/01'
            ],

            [
                'author_id' => '2',
                'category_id' => '2',
                'book_name' => 'Strange Case of Dr Jekyll and Mr Hyde',
                'isbn' => '97814123',
                'book_price' => '16.95',
                'book_description' => 'A classic children"s novel in the late 19th century.',
                'published_date' => '1993/02/01'
            ],

            [
                'author_id' => '3',
                'category_id' => '3',
                'book_name' => 'The Secret of Chimneys',
                'isbn' => '9781223',
                'book_price' => '9.99',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993/02/01'
            ],

            [
                'author_id' => '4',
                'category_id' => '4',
                'book_name' => 'Strange Case of Dr Jekyll and Mr Hyde',
                'isbn' => '97814123',
                'book_price' => '16.95',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993/02/01'
            ],

            [
                'author_id' => '5',
                'category_id' => '5',
                'book_name' => 'Unleashed',
                'isbn' => '9780008',
                'book_price' => '16.95',
                'book_description' => 'Written by L. Frank Baum is a classic children"s novel in the late 19th century.',
                'published_date' => '1993/02/01'
            ],

       
        ]);
    }
}
