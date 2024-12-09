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
};
