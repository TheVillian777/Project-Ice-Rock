<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchase';

    protected $fillable = [
        'user_id',
        'order_address',
        'order_date',
        'order_status',
        'order_total_price',
        'payment_method',
        'payment_details',
    ];

    // Table Relationships

    public function user(){
        return $this->belongsTo(User::class); 
    }
}
