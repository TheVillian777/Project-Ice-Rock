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

        //validate review details
        $validReview = $request->validate([
            'book_id' => 'required',
            'review_title' => 'required',
            'review_text' => 'required',
        ]);

        //creates validated review entry in database
        Review::create([
            'user_id' => Auth::id(),
            'book_id' => $validReview['book_id'],
            'review_title' => $validReview['review_title'],
            'review_text' => $validReview['review_text'],
            'review_rating' => $request->input('review_rating'),
            'review_date' => now()->toDateString()
        ]);

        

        return redirect()->back()->with('success', 'Thank you for leaving a review!'); //redirects back book page and displays message

    }
}