<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class BasketController extends Controller
{
    public function viewBasket(){ //displays items in basket

        $basket = Session::get('basket',[]); //gets session basket data (items in basket within specific session )



        return view('basket',compact('basket')); // returns basket view, passing basket data to it

    }

    public function basketUpdate(Request $request){

        $basket = Session::get('basket',[]); //gets session basket data (items in basket within specific session )
        
        $quantityUpdated= false;
        foreach ($basket as &$product) {
            if($product['book_ID'] == $request->book_id && $request->quantity >0 ) {
                $product['quantity'] = $request->quantity;
                $quantityUpdated= true;
                break;
            };

        }

        session()->put('basket',$basket);

        return redirect()->route('basket'); // returns basket view, passing basket data to it

    }
};
