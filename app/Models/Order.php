<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'order_date',
        'order_status',
        'order_address',
        'order_total_price'
    ];

    // Table Relationships

    public function customer(){
        return $this->belongsTo(Customer::class); 
    }

    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }

    public function payment(){
        return $this->hasMany(Payment::class);
    }
}
