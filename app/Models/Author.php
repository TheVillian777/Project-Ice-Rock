<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';

    protected $fillable = [
        'first_name',
        'last_name',
        'biography',
        'date_of_birth'
    ];

    // Table Relationships

    // This function defines the one-to-many relationship authors have to books as
    // There can be one author tied to many books
    public function books(){
        return $this->hasMany(Book::class);
    }
}
