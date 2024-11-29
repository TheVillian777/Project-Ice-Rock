<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'first_name' => 'Jack',
            'last_name' => 'Fryer',
            'email_address' => 'notjackfryer@gmail.com',
            'phone_number' => 123456789,
            'address' => 'Aston Uni'
        ]);
    }
}
