<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';

    protected $fillable = [
        'payment_date',
        'payment_method',
        'payment_amount',
        'order_id',
    ];

    // Table Relationships

    public function order(){
        return $this->belongsTo(Order::class);
    }

}
