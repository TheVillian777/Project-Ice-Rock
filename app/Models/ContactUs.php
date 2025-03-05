<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $table = 'contact_us';

    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'phone_number',
        'description'
    ];

    public $timestamps = false;
    //for now this is a seperate table with the sole purpose of storing customer quieres. can be expanded
}
