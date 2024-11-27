<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $primaryKey = 'customer_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'phone_number',
        'address',
    ];
}
