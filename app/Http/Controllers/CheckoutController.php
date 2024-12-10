<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{   
   
    public function validateBasket(Request $request){

        $request->validate([
            'first-name' => 'required',
            'last-name' => 'required',
            'address' => 'required',
            'card-number' => 'required|numeric|digits:16',
            'expiry-date' => 'required|date_format:m/y|after:today',
            'cvv' => 'required|numeric|digits:3',
        ]);

        return $this->storeDetails($request);

    }

    public function storeDetails(Request $request){

        $basket = Session::get('basket',[]);

        //dd(Auth::id());

        $customer = Customer::create([
            'users_id' => Auth::id(),
            'first_name' => request()->input('first-name'),
            'last_name' => request()->input('last-name'),
            'email_address' => User::find(Auth::id())->email,
            'phone_number' => 0,
            'address' => request()->input('address')
        ]);

        $order = Order::create([
            'customer_id' => $customer->id,
            'order_date' => now()->toDateString(),
            'order_status' => 'Yes',
            'order_address' => request()->input('address'),
            'order_total_price' => request()->input('total_price'),
        ]);

        for ($i = 0; $i < count($basket); $i++){
            OrderItem::create([
                'order_id' => $order->id,
                'book_id' => $basket[$i]['book_ID'],
                'quantity' => $basket[$i]['quantity'],
                'book_price' => $basket[$i]['price'],
                'subtotal_price' => number_format($basket[$i]['price'] * $basket[$i]['quantity'],2),
            ]);
        }

        Payment::create([
            'order_id' => $order->id,
            'payment_date' => now()->toDateString(),
            'payment_method' => 'card',
            'payment_amount' => request()->input('total_price'),
        ]);

        Session::put('basket', []);

        return redirect()->route('shop')->with('message','Checkout was successful!');

    }

}
