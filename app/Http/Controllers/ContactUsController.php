<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function contactUs(Request $contact)
    {
        // Validate the contact us message is valid
        $validate = $contact->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required',
            'phone_number' => 'required',
            'description' => 'required'
        ]);

        // Store all the contact info and description in the database
        ContactUs::create($validate);

        // returns back to the contact to show pop up message
        return redirect()->route('contact')->with('success', 'Thank you for reaching out! Your query has been sent off and we will get back shortly!');
    }
}
