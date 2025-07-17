<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';

    protected $fillable = [
        'user_id',
        'card_number',
        'expiry_date',
        'security_code',
    ];

    // Table Relationships
    //a payment id can be used for many purchases
    public function purchase(){
        return $this->hasMany(Purchase::class);
    }

    public function user(){
        return $this->belongsTo(User::class); 
    }
}
