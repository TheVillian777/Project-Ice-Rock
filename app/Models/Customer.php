<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'users_id',
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

    public function user(){
        return $this->hasOne(User::class);
    }
    
}
