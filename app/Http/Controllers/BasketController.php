<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function viewBasket(){ //displays items in basket

        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first(); //match user ids
        
        $basket = Session::get('basket'.Auth::id(),[]); //gets session basket data (items in basket within specific session )

        $total = 0;
        $totalItemsNo=0;

        foreach ($basket as &$product){ 
            $total = $total + $product['book_price'] * $product['quantity'];
            $totalItemsNo = $totalItemsNo + $product['quantity'];
        }

        return view('basket',compact('user','basket','total', 'totalItemsNo')); // returns basket view, passing to basket and total and totalItemsNo.
    }

    public function basketUpdate(Request $request){

        $basket = Session::get('basket'.Auth::id(),[]); //gets session basket data (items in basket within specific session )
        
        $quantityUpdated= false;
        foreach ($basket as $index => &$product) { // &allows original array to be altered
            if($product['book_ID'] == $request->book_id ) {
                $product['quantity'] = $request->quantity;
                $quantityUpdated= true;
                if($product['quantity'] <= 0) {
                    unset($basket[$index]);
                }
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
