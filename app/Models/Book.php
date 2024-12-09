<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'book';

    protected $fillable = [
        'book_name',
        'isbn',
        'book_price',
        'book_description',
        'published_date',
    ];

    // Table Relationships

    //This function defines the many-to-one relationship books have to authors
    //More than one book can be related to one author
    public function author(){
        return $this->belongsTo(Author::class);
    }

    //This function defines the many-to-one relationship books have to categories
    //More than one book can be related to one category
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //This function defines the one-to-many relationship books have to order items
    //The same book can be related to several order items but only one order item can be linked to a book
    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }

    //This function defines the one-to-one relationship books have to stock
    //A single book has a single entry in the stock 
    //This is a one-to-one as there is only one location for the stock 
    //This can be a one-to-many depending on if more stock locations are used
    public function stock(){
        return $this->hasOne(Stock::class);
    }

}
