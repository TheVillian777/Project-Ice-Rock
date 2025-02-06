<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'customer_id',
        'order_date',
        'order_status',
        'order_address',
        'order_total_price'
    ];

    // Table Relationships

    public function user(){
        return $this->belongsTo(User::class); 
    }

    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }

    public function payment(){
        return $this->hasMany(Payment::class);
    }
}
