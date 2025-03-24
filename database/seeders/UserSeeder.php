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



    //Dummy Users for demonstration purposes only

    public function run(): void
    {
        User::create([
            'title' => 'Mr',
            'first_name' => 'Shah',
            'last_name' => 'Ali',
            'email' => 'notshahali@gmail.com',
            'phone' => 123456789,
            'password' => 'password',
            'security_answer' => 'tom',
            'address' => '7 team3 lane',
            'security_level' => 'Senior-Admin'
            
        ]);

        User::create([
            'title' => 'Mr',
            'first_name' => 'Jagjeet',
            'last_name' => 'Hayer',
            'email' => 'notjagjeethayer@gmail.com',
            'phone' => 123456789,
            'password' => 'password',
            'security_answer' => 'jerry',
            'address' => '9 team3 lane',
            'security_level' => 'Admin'
        ]);

        User::create([
            'title' => 'Mr',
            'first_name' => 'Jack',
            'last_name' => 'Fryer',
            'email' => 'notjackfryer@gmail.com',
            'phone' => 123456789,
            'password' => 'password',
            'security_answer' => 'brian',
            'address' => '5 team3 lane',
            'security_level' => 'Customer'
        ]);
    }
}
