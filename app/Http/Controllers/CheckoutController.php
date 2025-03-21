<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{   
   
    public function validateBasket(Request $request){

        $request->validate([
            'first-name' => 'required',
            'last-name' => 'required',
            'address' => 'required',
            'card-number' => 'required|numeric|digits:16',
            'expiry-date' => 'required',
            'cvv' => 'required|numeric|digits:3',
        ]);

        return $this->storeDetails($request);

    }

    public function storeDetails(Request $request){

        $basket = Session::get('basket'.Auth::id(),[]);

        //dd(Auth::id());
        
        $purchase = Purchase::create([
            'user_id' => Auth::id(),
            'order_address' => request()->input('address'),
            'order_date' => now()->toDateString(),
            'order_status' => 'Delivered',
            'order_total_price' => request()->input('total_price'),
            'payment_method' => 'card',
            'payment_details' => substr(request()->input('card-number'), -4)
        ]);

        
        foreach ($basket as $order){
            OrderItem::create([
                'purchase_id' => $purchase->id,
                'book_id' => $order['book_ID'],
                'quantity' => $order['quantity'],
                'book_price' => $order['price'],
                'item_status' => 'Delivered',
                'subtotal_price' => number_format($order['price'] * $order['quantity'],2),
            ]);
        }

        Session::put('basket'.Auth::id(), []);

        return redirect()->route('shop')->with('message','Checkout was successful!');

    }

}
