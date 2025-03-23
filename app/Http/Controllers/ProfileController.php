<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
<<<<<<< Updated upstream
use App\Models\Purchase;
use App\Models\OrderItem;
use App\Models\User;
=======
<<<<<<< HEAD
use App\Models\Purchase;
use App\Models\OrderItem;
use App\Models\User;
=======
>>>>>>> parent of 26bef1a (merge)
>>>>>>> Stashed changes
=======
use Illuminate\Support\Facades\Session;
use App\Models\Purchase;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\Crypt;
>>>>>>> c8d3bb9e84e00f992c905c787a5a28c271222f31

class ProfileController extends Controller
{
    public function directToProfile()
    {
        $purchases = Purchase::All();

        //checks if user is logged in before going to profile page
        if (!Auth::check()){
            return redirect()->route('login');
        }

<<<<<<< HEAD
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
>>>>>>> Stashed changes
=======
        $wishlist = Session::get('wishlist'.Auth::id(),[]);
        $basket = Session::get('basket'.Auth::id(),[]);

>>>>>>> c8d3bb9e84e00f992c905c787a5a28c271222f31
        $orderitems = $this->showPastBooks(); 
        $showDetails = $this->showUserDetails();
        $showPaymentDetails = Payment::find(Payment::max('id'));
        if($showPaymentDetails) {
            $showPaymentDetails->card_number = Crypt::decryptString($showPaymentDetails->card_number);
            $showPaymentDetails->expiry_date = Crypt::decryptString($showPaymentDetails->expiry_date);
            $showPaymentDetails->security_code = Crypt::decryptString($showPaymentDetails->security_code);
        } else {
            $showPaymentDetails = null;
        }
        

        return view('profile', compact('basket', 'wishlist' , 'orderitems', 'showDetails', 'showPaymentDetails', 'purchases'));
    }

    public function showPastBooks()
    {
        $user_id = Auth::id();

        //match users and take just the purchase ids
        $purchase_ids = Purchase::where('user_id', $user_id)->pluck('id');

        //get item based off purchase id
        $orderitems = OrderItem::whereIn('purchase_id', $purchase_ids)
        ->with(['book', 'purchase'])->get(); //loads book and purchase tables alongside to display book title and order ID (purchase ID)

        return $orderitems; //return required data
    }

    public function showUserDetails()
    {
        $user_id = Auth::id();

        $user_details = User::where('id', $user_id)->first(); //match user ids and add customer to add address

        return $user_details; //return all user details from user table
    }

    public function updateInfo(Request $request){

        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first(); //match user ids

        $request->validate([
            'title' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'nullable',
            'address' => 'required'
        ]);

        if($user){
            $user->title = $request['title'];
            $user->first_name = $request['firstName'];
            $user->last_name = $request['lastName'];
            $user->phone = $request['phoneNumber'];
            $user->address = $request["address"];

        $user->save(); //save changes to editted user details
        return redirect()->route('profile')->with('message', 'Profile updated!');

        } else {
            return redirect()->route('profile')->with('message', 'Error!');
        }     
<<<<<<< Updated upstream
=======
=======
        return view('profile'); 
>>>>>>> parent of 26bef1a (merge)
>>>>>>> Stashed changes
    }

    public function updatePaymentDetails(Request $request){

        $newDetails = $request->validate([
            'cardNumber' => 'required',
            'expiryDate' => 'required',
            'cvv' => 'required',
        ]);

        $encryptedCardNumber = Crypt::encryptString(request()->input('cardNumber'));
        $encryptedExpiryDate = Crypt::encryptString(request()->input('expiryDate'));
        $encryptedSecurityCode = Crypt::encryptString(request()->input('cvv'));

        $payment = Payment::create([
            'user_id' => Auth::id(),
            'card_number' => $encryptedCardNumber,
            'expiry_date' => $encryptedExpiryDate,
            'security_code' => $encryptedSecurityCode
        ]);

        return redirect()->route('profile')->with('message', 'payment details updated!');
    }

    public function returnItem(Request $request){

        $purchase_id = request('purchaseID');
        $book_id = request('bookID');

        $user_id = Auth::id();

        $orderitems = OrderItem::where('purchase_id', $purchase_id)->where('book_id', $book_id)->limit(1)->first();

        if ($orderitems->quantity > 1){
            $orderitems->update(['subtotal_price' => number_format($orderitems->book_price * $orderitems->quantity,2)]);
            $orderitems->update(['quantity' => $orderitems->quantity - 1]);
            
            OrderItem::create([
                'purchase_id' => $purchase_id,
                'book_id' => $orderitems->book_id,
                'quantity' => $orderitems->quantity,
                'book_price' => $orderitems->book_price,
                'item_status' => 'Returned',
                'subtotal_price' => number_format($orderitems->book_price),
            ]);
        } else {
            $orderitems->update(['item_status' => 'Returned']);
        }
        

        return redirect()->route('profile');
    }

    public function viewOrder(Request $request){

        $orderitems = request('orderItems');

        $user_id = Auth::id();
        $purchase_id = request('purchaseID');
        $orderitems = OrderItem::where('purchase_id', $purchase_id)->get();

        return view('reciepts', compact('orderitems','user_id','purchase_id'));
    }
}
