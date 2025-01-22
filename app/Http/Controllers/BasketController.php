<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class BasketController extends Controller
{
    public function viewBasket(){ //displays items in basket

        $basket = Session::get('basket',[]); //gets session basket data (items in basket within specific session )

        $total = 0;
        $totalItemsNo=0;

        foreach ($basket as &$product){ 
            $total = $total + $product['price'] * $product['quantity'];
            $totaltemsNo = $totalItemsNo + $product['quantity'];
        }



        return view('basket',compact('basket','total', 'totalItemsNo')); // returns basket view, passing to basket and total and totalItemsNo.
    }

    public function basketUpdate(Request $request){

        $basket = Session::get('basket',[]); //gets session basket data (items in basket within specific session )
        
        $quantityUpdated= false;
        foreach ($basket as &$product) { // &allows original array to be altered
            if($product['book_ID'] == $request->book_id && $request->quantity >0 ) {
                $product['quantity'] = $request->quantity;
                $quantityUpdated= true;

                break;
            };

        }

        session()->put('basket',$basket);

        return redirect()->route('basket'); // returns basket view, passing basket data to it

    }
    public function basketRemove(Request $request){

        $basket = Session::get('basket',[]); //gets session basket data (items in basket within specific session )
        $id = request()->input('book_id');

        for ($i = 0; $i < count($basket); $i++){
            if($basket[$i]['book_ID'] == $id){
                unset($basket[$i]);
            } 
        }

        session()->put('basket',$basket);

        return redirect()->route('basket'); // returns basket view, passing basket data to it

    }
};
