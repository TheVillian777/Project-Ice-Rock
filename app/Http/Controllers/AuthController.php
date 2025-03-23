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
<<<<<<< Updated upstream
    $user = $request->validate([
        'title' => 'required',
=======
<<<<<<< HEAD
    $user = $request->validate([
        'title' => 'required',
=======
    $user->validate([
>>>>>>> parent of 26bef1a (merge)
>>>>>>> Stashed changes
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'phone' => 'nullable',
        'password' => 'required',
<<<<<<< Updated upstream
        'address' => 'required',
        'security_answer' => 'required',
=======
<<<<<<< HEAD
        'address' => 'required',
        'security_answer' => 'required',
=======
>>>>>>> parent of 26bef1a (merge)
>>>>>>> Stashed changes
    ]);

    //save registration to Users table
    User::create([
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
>>>>>>> Stashed changes
        'title' => $user['title'],
        'first_name' => $user['first_name'],
        'last_name' => $user['last_name'],
        'email' => $user['email'],
        'phone' => $user['phone'],
<<<<<<< Updated upstream
        'isadmin' => false,
        'address' => $user['address'],
        'security_answer' => $user['security_answer'],
        'password' => Hash::make($user['password']), //Hash for security with built in method
=======
        'isadmin' => false,
        'address' => $user['address'],
        'security_answer' => $user['security_answer'],
        'password' => Hash::make($user['password']), //Hash for security with built in method
=======
        'first_name' => $user->first_name,
        'last_name' => $user->last_name,
        'email' => $user->email,
        'phone' => $user->phone,
        'isadmin' => false,
        'password' => Hash::make($user->password), //Hash for security with built in method
>>>>>>> parent of 26bef1a (merge)
>>>>>>> Stashed changes
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
