<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_item';

    protected $fillable = [
        'order_id',
        'book_id',
        'book_price',
        'quantity',
        'book_price',
        'subtotal_price'
    ];

    // Table Relationships

    //This function defines the one-to-many relationship order items have to books
    //Many order items can be related to one book but only one book can be related to an order item
    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

}
