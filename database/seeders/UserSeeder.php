<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


     
    public function run(): void
    {
        User::create([
            'title' => 'Mr',
            'first_name' => 'Shah',
            'last_name' => 'Ali',
            'email' => 'notshahali@gmail.com',
            'phone' => 123456789,
            'password' => 'Password1_',
            'security_answer' => 'tom',
            'address' => '7 team3 lane'
        ]);

        User::create([
            'title' => 'Mr',
            'first_name' => 'Jagjeet',
            'last_name' => 'Hayer',
            'email' => 'notjagjeethayer@gmail.com',
            'phone' => 123456789,
            'password' => 'Password1_',
            'security_answer' => 'jerry',
            'address' => '9 team3 lane'
        ]);

        User::create([
            'title' => 'Mr',
            'first_name' => 'Jack',
            'last_name' => 'Fryer',
            'email' => 'notjackfryer@gmail.com',
            'phone' => 123456789,
            'password' => 'Password1_',
            'security_answer' => 'brian',
            'address' => '5 team3 lane'
        ]);
    }
}
