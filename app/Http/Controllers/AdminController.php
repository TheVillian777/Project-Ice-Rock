<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin');
    }

    public function users()
    {
        return view('adminUsers');
    }

    public function usersView()
    {
        return view('adminUsersView');
    }

    public function stock()
    {
        return view('adminStock');
    }

    public function gatherUsers(){

        //Fetch all users
        $users = User::all();
 

        //Pass users to the users display
        return view('adminUsers',compact('users'));
    }

    public function searchUser(Request $request){

        $search = $request->input('search');
        $users = User::where('first_name','like','%' . $search . '%')
        ->orWhere('last_name','like','%' . $search . '%')
        ->get();

        return view('adminUsers', compact('users'));
    }

    



}
