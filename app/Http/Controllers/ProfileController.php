<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchase;
use App\Models\OrderItem;
use App\Models\User;

class ProfileController extends Controller
{
    public function directToProfile()
    {
        //checks if user is logged in before going to profile page
        if (!Auth::check()){
            return redirect()->route('login');
        }

        $orderitems = $this->showPastBooks(); 
        $showDetails = $this->showUserDetails();

        return view('profile', compact('orderitems', 'showDetails'));
    }

    public function showPastBooks()
    {
        $user_id = Auth::id();

        //match users and take just the purchase ids
        $purchase_ids = Purchase::where('user_id', $user_id)->pluck('id');

        //get item based off purchase id
        $orderitems = OrderItem::whereIn('purchase_id', $purchase_ids)
        ->with(['book', 'purchase'])->get(); //loads book and purchase tables alongside to display book title and order ID (purchase ID)

        return $orderitems; //return required data
    }

    public function showUserDetails()
    {
        $user_id = Auth::id();

        $user_details = User::where('id', $user_id)->first(); //match user ids

        return $user_details; //return all user details from user table
    }

    public function updateInfo(Request $request){

        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first(); //match user ids

        $request->validate([
            'title' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'nullable',
        ]);

        if($user){
            $user->title = $request['title'];
            $user->first_name = $request['firstName'];
            $user->last_name = $request['lastName'];
            $user->phone = $request['phoneNumber'];
        

        $user->save(); //save changes to editted user details
        return redirect()->route('profile')->with('message', 'Profile updated!');

        } else {
            return redirect()->route('profile')->with('message', 'Error!');
        }     
    }
}
