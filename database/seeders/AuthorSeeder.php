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
        DB::table('authors')->insert([
            [
                'first_name' => 'Lyman',
                'last_name' => 'Frank Baum',
                'biography' => 'Author and Novelist',
                'date_of_birth' => '1856-05-15'
            ],

            [
                'first_name' => 'Robert',
                'last_name' => 'Louis Stevenson',
                'biography' => 'Author and Novelist',
                'date_of_birth' => '1856-05-15'
            ],

            [
                'first_name' => 'Agatha',
                'last_name' => 'Christie',
                'biography' => 'Author',
                'date_of_birth' => '1890-09-15'
            ],

            [
                'first_name' => 'Arthur ',
                'last_name' => 'Conan Doyle',
                'biography' => 'Author and Novelist',
                'date_of_birth' => '1856-05-15'
            ],

            [
                'first_name' => 'Boris',
                'last_name' => 'Johnson',
                'biography' => 'Author',
                'date_of_birth' => '1964-06-19'
            ],

            [
                'first_name' => 'JK',
                'last_name' => 'Rowling',
                'biography' => 'Author',
                'date_of_birth' => '1965-07-31'
            ],

            [
                'first_name' => 'Stephen',
                'last_name' => 'King',
                'biography' => 'Author',
                'date_of_birth' => '1947-09-21'
            ],

            [
                'first_name' => 'Barak',
                'last_name' => 'Obama',
                'biography' => 'Author and Politician',
                'date_of_birth' => '1961-08-04'
            ],

            [
                'first_name' => 'J.R.R',
                'last_name' => 'Tolkien',
                'biography' => 'Author',
                'date_of_birth' => '1892-01-03'
            ],

            [
                'first_name' => 'Paula',
                'last_name' => 'Hawkins',
                'biography' => 'Author',
                'date_of_birth' => '1972-08-26'
            ],

            [
                'first_name' => 'David',
                'last_name' => 'Baldacci',
                'biography' => 'Novelist and attorney',
                'date_of_birth' => '1960-08-05'
            ],

            [
                'first_name' => 'Steve',
                'last_name' => 'Jobs',
                'biography' => 'Former CEO of Apple',
                'date_of_birth' => '1955-02-24'
            ],

            [
                'first_name' => 'George R. R',
                'last_name' => 'Martin',
                'biography' => 'author',
                'date_of_birth' => '1948-09-20'
            ],

            [
                'first_name' => 'Bram',
                'last_name' => 'Stoker',
                'biography' => 'author',
                'date_of_birth' => '1847-11-08'
            ],

            [
                'first_name' => 'Dan',
                'last_name' => 'Brown',
                'biography' => 'author',
                'date_of_birth' => '1964-06-22'
            ],

            [
                'first_name' => 'Peter',
                'last_name' => 'Swanson',
                'biography' => 'author',
                'date_of_birth' => '1968-05-26'
            ],

            [
                'first_name' => 'Walter',
                'last_name' => 'Isaacson',
                'biography' => 'author',
                'date_of_birth' => '1952-05-20'
            ],

            [
                'first_name' => 'Stacy',
                'last_name' => 'Willingham',
                'biography' => 'author',
                'date_of_birth' => '1991-01-30'
            ],

            [
                'first_name' => 'Mary',
                'last_name' => 'Kubica',
                'biography' => 'author',
                'date_of_birth' => '1978-02-15'
            ],

            [
                'first_name' => 'Al',
                'last_name' => 'Pacino',
                'biography' => 'actor',
                'date_of_birth' => '1940-04-25'
            ],


        ]);
    }
}
