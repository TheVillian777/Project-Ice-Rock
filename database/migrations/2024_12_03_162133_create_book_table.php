<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Author;
use App\Models\Category;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Author::class)->index();
            $table->foreignIdFor(Category::class)->index();
            $table->char('book_name', length: 15);
            $table->int('isbn'); //may contain leading Zeros
            $table->decimal('book_price', total: 10, places: 2);
            $table->char('book_description', length: 100);
            $table->date('published_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
