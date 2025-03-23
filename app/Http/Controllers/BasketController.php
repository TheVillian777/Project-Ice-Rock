<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use Illuminate\Support\Facades\Crypt;

class BasketController extends Controller
{
    public function viewBasket(){ //displays items in basket

        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first(); //match user ids
        $payment = Payment::find(Payment::where('user_id', $user_id)->max('id')); //retrieves most recent payment details
        
        if($payment) {
            $payment->card_number = Crypt::decryptString($payment->card_number);
            $payment->expiry_date = Crypt::decryptString($payment->expiry_date);
            $payment->security_code = Crypt::decryptString($payment->security_code);
        } else {
            $payment = null;
        }

        $basket = Session::get('basket'.Auth::id(),[]); //gets session basket data (items in basket within specific session )

        $total = 0;
        $totalItemsNo=0;

        foreach ($basket as &$product){ 
            $total = $total + $product['book_price'] * $product['quantity'];
            $totaltemsNo = $totalItemsNo + $product['quantity'];
        }

        return view('basket',compact('user','basket','total', 'totalItemsNo', 'payment')); // returns basket view, passing to basket and total and totalItemsNo.
    }

    public function basketUpdate(Request $request){

        $basket = Session::get('basket'.Auth::id(),[]); //gets session basket data (items in basket within specific session )
        
        $quantityUpdated= false;
        foreach ($basket as &$product) { // &allows original array to be altered
            if($product['book_ID'] == $request->book_id && $request->quantity >0 ) {
                $product['quantity'] = $request->quantity;
                $quantityUpdated= true;
                break;
            };

        }

        session()->put('basket'.Auth::id(),$basket);

        return redirect()->route('basket'); // returns basket view, passing basket data to it

    }
    public function basketRemove(Request $request){

        $basket = Session::get('basket'.Auth::id(),[]); //gets session basket data (items in basket within specific session )
        $id = request()->input('book_id');

        for ($i = 0; $i < count($basket); $i++){
            if($basket[$i]['book_ID'] == $id){
                unset($basket[$i]);
            } 
        }

        session()->put('basket'.Auth::id(),$basket);

        return redirect()->route('basket'); // returns basket view, passing basket data to it

    }
};
