<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'name',
        'description'
    ];

    // Table Relationships

    //This defines the one-to-many relation that categories has with books
    //There can only be one category related to several books but several books can be related to one category
    public function books(){
        return $this->hasMany(Book::class);
    }

}
