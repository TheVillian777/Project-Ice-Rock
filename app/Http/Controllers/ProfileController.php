<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchase;
use App\Models\OrderItem;

class ProfileController extends Controller
{
    public function directToProfile()
    {
        //checks if user is logged in before going to profile page
        if (!Auth::check()){
            return redirect()->route('login');
        }

        return $this->showPastBooks(); 
    }

    public function showPastBooks()
    {
        $user_id = Auth::id();

        //match users and take just the purchase ids
        $purchase_ids = Purchase::where('user_id', $user_id)->pluck('id');

        //get item based off purchase id
        $orderitems = OrderItem::whereIn('purchase_id', $purchase_ids)
        ->with(['book', 'purchase'])->get(); //loads book and purchase tables alongside to display book title and order ID (purchase ID)

        return view('profile',compact('orderitems')); //view required data
    }
}
