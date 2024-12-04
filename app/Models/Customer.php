<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'phone_number',
        'address',
    ];

    // Table Relationships

    public function order(){
        return $this->hasMany(Order::class);
    }
    
}
