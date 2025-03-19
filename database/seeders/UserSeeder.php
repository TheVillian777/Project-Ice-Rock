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
            'first_name' => 'Jack',
            'last_name' => 'Fryer',
            'email' => 'notjackfryer@gmail.com',
            'phone' => 123456789,
            'isadmin' => false,
            'password' => 'password',
            'security_answer' => 'brian',
            'address' => '5 team3 lane'
        ]);
    }
}
