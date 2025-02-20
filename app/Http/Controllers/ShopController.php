<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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

    public function navShop(Request $request){
        
        $filterOption = $request->input('genre-select');
        
        //Fetch all categories
        $categories = Category::all();
        $books = Book::with('author')->where('category_id', $filterOption)->get();

        return view('shop',compact('categories','books'));

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

    public function addToBasket(Request $request)
    {
        $bookId = Book::find($request->bookId); // gets brook from database using book id

        $basket = Session::get('basket',[]);// gets current baskset session or leaves it as empty
    
        //checks if book is already in basket, if so quanitity is increased.
        $bookAddedAlready = false;
        // pass by value '&' allows direct array update to occur and quantity to be increased
        foreach ($basket as &$product) {
            if($product['book_ID'] == $bookId->id) {
                $product['quantity'] += $request->quantity;
                $bookAddedAlready = true;
                break;
            }

        }

        //add book to basket
        if (!$bookAddedAlready) {
            $basket[] = [
                'book_ID' => $bookId->id,
                'book_name' => $bookId->book_name,
                'first_name' => $bookId->author->first_name,
                'last_name' => $bookId->author->last_name,
                'price' => $bookId->book_price,
                'img_url' => $bookId->img_url,
                'published_date' => $bookId->published_date,
                'quantity' => $request->quantity,
 
            ];
        }

        //saves basket to session
        session()->put('basket',$basket);
        //dd($basket);
        
        return redirect()->route('shop')->with('message','Item has been successfully added to basket!'); // redirects user to homepage and sends a confirmation messaage


    }

    public function listBook(Request $request){

        $viewed = Session::get('recentView',[]);

        $id = request()->input('book_id');
        $book = Book::find($id);

        foreach ($viewed as &$books) {
            if($books['book_ID'] == $book->id) {
                return view('listing',compact('book'));
            }
        }

        if(count($viewed) < 4) {
            $viewed[] = [
                'book_ID' => $book->id,
                'book_name' => $book->book_name,
                'first_name' => $book->author->first_name,
                'last_name' => $book->author->last_name,
                'price' => $book->book_price,
                'img_url' => $book->img_url,
                'published_date' => $book->published_date,
            ];
        } else {
            array_pop($viewed);
            $newViewed = [
                'book_ID' => $book->id,
                'book_name' => $book->book_name,
                'first_name' => $book->author->first_name,
                'last_name' => $book->author->last_name,
                'price' => $book->book_price,
                'img_url' => $book->img_url,
                'published_date' => $book->published_date,
            ];
            array_unshift($viewed,$newViewed);
        }

        session()->put('recentView',$viewed);
        //$request->session()->forget('recentView');
        
        return view('listing',compact('book'));

    }
};
