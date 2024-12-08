<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class ShopController extends Controller
{
    //Grabbing all categories in the database
    public function gatherData(){

        //Fetch all categories
        $categories = Category::all();
        $books = Book::with('author')->get();

        //Pass categories to the shop listing view
        return view('shop',compact('categories','books'));
    }

    public function searchShop(Request $request){

        $search = $request->input('search');

        $categories = Category::all();
        $books = Book::with('author')->where('book_name','like','%' . $search . '%')->get();

        return view('shop', compact('categories','books'));

    }

    public function filterShop(Request $request){

        $filterOptions = $request->input('options', []);
        $priceRange = $request->input('priceRange');
        $priceRange = floatval($priceRange);

        //Fetch all categories
        $categories = Category::all();
        if (!empty($filterOptions)){
            $books = Book::with('author')->whereIn('category_id', $filterOptions)->where('book_price', '>', $priceRange)->get();
        } else {
            $books = Book::with('author')->where('book_price', '>', $priceRange)->get();
        }

        //Pass categories to the shop listing view
        return view('shop',compact('categories','books'));

    }
}
