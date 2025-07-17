<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class AuthControllerTest extends TestCase
{
    public function test_login_user_with_validdetails()
    {
        //create test user
        $testUser = User::create([
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

    public function test_login_with_invaliddetails()
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
            'email' => 'nottestuser@gmail.com',
            'password' => '1234'
        ]);

        //incorrect details should redirect back to login
        $response->assertRedirect(route('login'));

        $testUser->delete(); //delete user to stop duplications
    }

    public function test_register_with_validdetails()
    {
        $response = $this->post('/register', [
            'title' => 'Mr',
            'first_name' => 'Jack',
            'last_name' => 'Fryer',
            'phone' => 123456789,
            'isadmin' => false,
            'security_answer' => 'brian',
            'address' => '5 team3 lane',
            'email' => 'testuser@gmail.com',
            'password' => '123',
            'confirm-password' => '123'
        ]);

        //see if this has ended up with a user in the db
        $this->assertDatabaseHas('users', [
            'email' => 'testuser@gmail.com'
        ]);

        //delete newly corrected user
        $user = User::where('email', 'testuser@gmail.com')->first();
        $user->delete();
    }

    public function test_register_with_differing_passwords()
    {
        $response = $this->post('/register', [
            'title' => 'Mr',
            'first_name' => 'Jack',
            'last_name' => 'Fryer',
            'phone' => 123456789,
            'isadmin' => false,
            'security_answer' => 'brian',
            'address' => '5 team3 lane',
            'email' => 'testuser@gmail.com',
            'password' => '123',
            'confirm-password' => '1234'
        ]);

        //make sure user hasn't been generated
        $this->assertDatabaseMissing('users', [
            'email' => 'testuser@gmail.com'
        ]);
    }

    public function test_logout_redirects()
    {
        $response = $this->post('/logout');

        $response->assertRedirect(route('index'));
    }

    public function test_forgottenpassword_with_validdetails()
    {
        //create test user
        $testUser = User::create([
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

        $response = $this->post('/forgottenPassword', [
            'email' => 'testuser@gmail.com',
            'security_answer' => 'brian',
            'password' => 'not123',
            'confirm-password' => 'not123'
        ]);

        //ensure user is redirected to login
        $response->assertRedirect(route('login'));

        $testUser->delete();
    }

    public function test_forgottenpassword_with_wrong_securityanswer()
    {
        //create test user
        $testUser = User::create([
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

        $response = $this->post('/forgottenPassword', [
            'email' => 'testuser@gmail.com',
            'security_answer' => 'notbrian',
            'password' => 'not123',
            'confirm-password' => 'not123'
        ]);

        //confirm password has not changed
        $this->assertDatabaseMissing('users', [
            'password' => 'not123'
        ]);

        $testUser->delete();
    }
}