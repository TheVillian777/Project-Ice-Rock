<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  //register a user
  public function register(Request $user)
  {
    //validate registration details
    $user->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'password' => 'required',
    ]);

    //save registration to Users table
    User::create([
        'first_name' => $user->first_name,
        'last_name' => $user->last_name,
        'email' => $user->email,
        'phone' => $user->phone,
        'isadmin' => false,
        'password' => Hash::make($user->password), //Hash for security with built in method
    ]);

    return redirect()->back()->with('Registration successful!');
  }
  
  //login a user
  public function login(Request $user)
  {
    //validate login details
    $user->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    if (Auth::attempt($user->only('email', 'password'))) {
        return redirect()->route('shop'); // Redirect to the shop page
    }
    return redirect()->back()->withErrors(['Incorrect login details']);
  }

  
public function logout()
{
    Auth::logout();  // Log the user out
    
    return redirect()->route('index');  // Redirect to the home page
}
}
