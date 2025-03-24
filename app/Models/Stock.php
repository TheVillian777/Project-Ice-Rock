<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stock';

    protected $fillable = [
        'book_id',
        'stock_quantity'
    ];

    // Table Relationships

    //This function defines the one to one relationship the Stock has with the books
    //There is only one stock entry for each book
    //This would be different if there are multiple stock locations
    public function book(){
        return $this->hasOne(Book::class);
    }
}
