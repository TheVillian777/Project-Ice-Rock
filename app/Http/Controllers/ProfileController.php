<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function directToProfile()
    {
        //checks if user is logged in before going to profile page
        if (!Auth::check()){
            return redirect()->route('login');
        }

        return view('profile'); 
    }
}
