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
    }else if (strlen($user['password']) < 8 ) {
        return redirect()->route('login', ['option' => 'register'])->withErrors("Registeration failed.\nPassword must be more than 7 characters.");
    } else if (preg_match('/[^a-zA-Z0-9]/',$user['password']) < 1) {
        return redirect()->route('login', ['option' => 'register'])->withErrors("Registeration failed.\nPassword must contain one or more symbols.");
    } else if (preg_match('/[A-Z]/',$user['password']) < 1) {
        return redirect()->route('login', ['option' => 'register'])->withErrors("Registeration failed.\nPassword must contain one or more uppercase letters.");
    } else if (preg_match('/[@]/',$user['email']) != 1) {
        return redirect()->route('login', ['option' => 'register'])->withErrors("Registeration failed.\nEmail is incorrect.");
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

    return redirect()->back()->withErrors('Registration successful!');
  }
  
  public function login(Request $request)
  {
      // Validate login inputs
      $credentials = $request->validate([
          'email' => 'required|email',
          'password' => 'required',
      ]);
  
      $user = User::whereRaw('LOWER(email) = ?', [strtolower($credentials['email'])])->first();
  
      if (!$user) {
          return back()->withErrors([
              'email' => 'This is not a registered email.',
          ])->withInput();
      }
  
      if (!Hash::check($credentials['password'], $user->password)) {
        session()->forget('errors');
    
        return back()->withErrors([
            'password' => 'Incorrect password.',
        ])->withInput([
            'email' => $credentials['email']
        ]);
    }
  
      Auth::login($user);
      $request->session()->regenerate();
  
      return redirect()->route('shop');
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
      ]);
  }
  
    if ($user['password'] !== $request->input('confirm-password')) {
      return redirect()->back()->withErrors([
          'password' => 'Passwords do not match.'
      ]);
  }

    $forgottenUser->update(['password' => Hash::make($user['password'])]);

    return redirect()->route('login');

    }
    public function joinUs(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
    
        return redirect()->back()
            ->with('success', 'Success! Please check your inbox.')
            ->with('show_more', true);
    }
    
}
