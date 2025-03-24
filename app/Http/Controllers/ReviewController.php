<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Review;
use App\Models\User;
use App\Models\Book;

class ReviewController extends Controller

{
    public function reviewSubmit(Request $request)
    {   

        if (Auth::check()) {
            //validate review details
            $validReview = $request->validate([
            'book_id' => 'required',
            'review_title' => 'required',
            'review_text' => 'required',
            'review_rating' => 'required'
             ]);

        //creates validated review entry in database
            Review::create([
                'user_id' => Auth::id(),
                'book_id' => $validReview['book_id'],
                'review_title' => $validReview['review_title'],
                'review_text' => $validReview['review_text'],
                'review_rating' => $validReview['review_rating'],
            'review_date' => now()->toDateString()
            ]);

        

            return redirect()->back()->with('success', 'Thank you for leaving a review!'); //redirects back book page and displays message

            
          
        }
         
        else {
            
            return redirect()->route('login')->with('message', 'Please login/register an account to leave a review, thanks!');
        }
        
    }

    public function seeReviews($book_id)
    {
        //gets all reviews for book
        $book = Book::find($book_id);

        //gets all reviews for specific book
        $reviews = Review::where('book_id', $book_id)->get();

        //calculates average rating for specific book
        $averageRating = $reviews->avg('review_rating');

        //passes variables book , reviews and average rating to reviews blade
        return view('reviews', compact('book','reviews','averageRating'));
    }


}