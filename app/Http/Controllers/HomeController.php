<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class HomeController extends Controller
{

    public function gatherData(){

        //Fetch all categories
        $categories = Category::all();
        $books = Book::with('author')->get();
        $viewed = Session::get('recentView'.Auth::id(),[]);
        $reviews = Review::all();
        $admin = User::where('id', Auth::id())->value('security_level');

        //Pass categories to the shop listing view
        return view('index',compact('viewed','categories','books','reviews','admin'));
    }

}
