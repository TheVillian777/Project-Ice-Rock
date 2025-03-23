<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  //register a user
  public function register(Request $request)
  {
    //validate registration details
    $user = $request->validate([
        'title' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'phone' => 'nullable',
        'password' => 'required',
        'address' => 'required',
        'security_answer' => 'required',
        'confirm-password' =>  'required'
    ]);

    if ($user['password'] !== $request->input('confirm-password')) {
      return redirect()->back()->withErrors('Password does not match');
    }

    //save registration to Users table
    User::create([
        'title' => $user['title'],
        'first_name' => $user['first_name'],
        'last_name' => $user['last_name'],
        'email' => $user['email'],
        'phone' => $user['phone'],
        'isadmin' => false,
        'address' => $user['address'],
        'security_answer' => $user['security_answer'],
        'password' => Hash::make($user['password']), //Hash for security with built in method
    ]);

    return redirect()->back()->with('Registration successful!');
  }
  
  //login a user
  public function login(Request $request)
  {
    //validate login details
    $user = $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    if (Auth::attempt($user)) {
      $request->session()->regenerate();
      return redirect()->route('shop'); // Redirect to the shop page
    }
    return redirect()->route('login')->with('message', 'Incorrect Password');
  }

  
  public function logout(Request $request)
  {
      Auth::logout();  // Log the user out

      $request->session()->regenerate();
      $request->session()->regenerateToken();
    
      return redirect()->route('index');  // Redirect to the home page
  }

  public function forgottenPassword(Request $request)
  {
    //validate forgotten details
    $user = $request->validate([
      'email' => 'required',
      'security_answer' => 'required',
      'password' => 'required',
      'confirm-password' => 'required'
    ]);

    //retrieve the forgotten user using the details provided
    $forgottenUser = User::where('email', $user['email'])
    ->where('security_answer', $user['security_answer'])->first();

    if (!$forgottenUser){
      return redirect()->back()->withErrors([
        'security_answer' => 'Security question is incorrect.'
    ]);    }

    if ($user['password'] !== $request->input('confirm-password')) {
      return redirect()->back()->withErrors([
        'confirm-password' => 'Passwords do not match.'
    ]);
    }

    $forgottenUser->update(['password' => Hash::make($user['password'])]);

    return redirect()->route('login');

    }
}
