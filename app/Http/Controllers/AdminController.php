<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Facades\Hash;


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

    public function usersView($user_id)
    {
        $users = User::find($user_id);
        $showDetails = $this->showUserDetails($user_id);
        return view('adminUsersView',compact('showDetails'));
    }

    public function showUserDetails($user_id)
    {
        $user_details = User::where('id', $user_id)->first(); //match user ids and add customer to add address

        return $user_details; //return all user details from user table
    }

    public function stock()
    {
        $books = Book::all()-get();
        return view('adminStock',compact('stock'));
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
        ->orWhere('email','like','%' . $search . '%')
        ->get();

        return view('adminUsers', compact('users'));
    }


    public function adminInfoChange(Request $request,$user_id){
        $user = User::where('id', $user_id)->first(); //match user ids

        //validate user details
        $request->validate([
            'title' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'nullable',
            'address' => 'required'
        ]);

        if($user){
            //update user details with details in field
            $user->title = $request['title'];
            $user->first_name = $request['firstName'];
            $user->last_name = $request['lastName'];
            $user->phone = $request['phoneNumber'];
            $user->address = $request["address"];
            $user->email = $request["email"];
            $user->security_answer = $request["security_answer"];

            //checks if security level field is filled first, if filled: updates security level
            if($request->filled('security_level')){
                $user->security_level = $request['security_level'];
            }

            //checks if password field is filled first, if filled: checks if password matchs confirm password before hashing and submitting to table
            if ($request->input('password') !== $request->input('confirm-password')) {
                return redirect()->back()->withErrors('Passwords do not match');
              } else {
                if ($request->filled('password')) {
                  $user->password = Hash::make($request->input('password'));
                }
              }

   
        $user->save(); //save changes to editted user details
        return redirect()->route('adminUserView', ['user_id'=>$user_id])->with('message', 'Profile updated!');

        } 
    }

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

}



