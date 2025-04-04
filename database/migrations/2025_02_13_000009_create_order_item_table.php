<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Book;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->constrained('purchase')->onDelete('cascade');
            $table->foreignId('book_id')->constrained('book')->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('book_price', total: 10, places: 2);
            $table->decimal('subtotal_price', total: 10, places: 2);
            $table->string('item_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_item');
    }
};
