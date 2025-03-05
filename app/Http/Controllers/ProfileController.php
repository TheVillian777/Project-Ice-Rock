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

        return view('profile'); 
    }

    public function showPastBooks()
    {
        $user_id = Auth::id();

        //match users and take just the purchase ids
        $purchase_ids = Purchase::where('user_id', $user_id)->pluck('id');

        //get book ids from order item based off purchase id
        $book_ids = OrderItem::whereIn('purchase_id', $purchase_ids)->pluck('book_id');
    }
}
