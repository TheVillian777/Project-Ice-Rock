<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthControllerTest extends TestCase
{
    public function test_login_user_with_validdetails()
    {
        //create test user
        $testUser = User::factory()->create([
            'title' => 'mr',
            'first_name' => 'Jack',
            'last_name' => 'Fryer',
            'phone' => 123456789,
            'isadmin' => false,
            'security_answer' => 'brian',
            'address' => '5 team3 lane',
            'email' => 'testuser@gmail.com',
            'password' => '123'
        ]);

        //create expected response
        $response = $this->post('/login', [
            'title' => 'Mr',
            'first_name' => 'Jack',
            'last_name' => 'Fryer',
            'phone' => 123456789,
            'isadmin' => false,
            'security_answer' => 'brian',
            'address' => '5 team3 lane',
            'email' => 'testuser@gmail.com',
            'password' => '123'
        ]);

        //ensure the user is redirected to shop page as expected
        $response->assertRedirect(route('shop'));

        $testUser->delete(); //delete user to stop duplications
    }

    public function test_user_with_invaliddetails()
    {
        //create test user
        $testUser = User::create([
            'title' => 'Mr',
            'first_name' => 'Jack',
            'last_name' => 'Fryer',
            'phone' => 123456789,
            'isadmin' => false,
            'security_answer' => 'brian',
            'address' => '5 team3 lane',
            'email' => 'testuser@gmail.com',
            'password' => '123'
        ]);

        //create incorrect response
        $response = $this->post('/login', [
            'title' => 'Mr',
            'first_name' => 'Jack',
            'last_name' => 'Fryer',
            'phone' => 123456789,
            'isadmin' => false,
            'security_answer' => 'brian',
            'address' => '5 team3 lane',
            'email' => 'nottestuser@gmail.com',
            'password' => Hash::make('123')
        ]);

        //incorrect details should redirect back to login
        $response->assertRedirect(route('login'));

        $testUser->delete(); //delete user to stop duplications
    }
}