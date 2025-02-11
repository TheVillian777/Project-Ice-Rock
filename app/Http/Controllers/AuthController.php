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
        'security_answer' => 'required',
    ]);

    //save registration to Users table
    User::create([
        'first_name' => $user->first_name,
        'last_name' => $user->last_name,
        'email' => $user->email,
        'phone' => $user->phone,
        'isadmin' => false,
        'security_answer' => $user->security_answer,
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

  public function forgottenPassword(Request $user)
  {
    //validate forgotten details
    $user->validate([
      'email' => 'required',
      'security_answer' => 'required',
      'password' => 'required',
      'confirm-password' => 'required'
    ]);

    //retrieve the forgotten user using the details provided
    $forgottenUser = User::where('email', $user->email)
    ->where('security_answer', $user->security_answer)->first();

    if (!$forgottenUser){
      return redirect()->back()->withErrors('No matching details');
    }

    if ($user->password !== $user->input('confirm-password')) {
      return redirect()->back()->withErrors('Password does not match');
    }

    $forgottenUser->update(['password' => Hash::make($user->password)]);

    return redirect()->route('login');

    }
}
