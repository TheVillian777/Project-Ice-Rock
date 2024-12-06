<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ShopController extends Controller
{
    //Grabbing all categories in the database
    public function gatherCategories(){

        //Fetch all categories
        $categories = Category::all();

        //Pass categories to the shop listing view
        return view('shop',compact('categories'));
    }
}
