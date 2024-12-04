<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('book_name');
            $table->string('isbn'); //may contain leading Zeros
            $table->decimal('book_price',10,2);
            $table->string('book_description');
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
