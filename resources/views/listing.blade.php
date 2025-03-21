<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Listing</title>
</head>
<body>
<!-- header -->
|@include('header')

<!-- book cover -->
<div class="image-box">
    <img src="{{ asset('images/' . $book->img_url) }}" alt="Book Cover">
</div> 

<!-- product info -->
<div class="product-info">
    <div class="book-info">
        <h1>{{ $book->book_name }}</h1>
        <p>{{ $book->author->first_name . " " . $book->author->last_name }}</p>
        <p>£{{ $book->book_price }}</p>
        <p>{{ $book->description }}</p>
    </div>

    <!-- basket icon -->
    <div class="basket-icon">
        <form action="{{ route('addToBasket') }}" method="POST" class="basket-form">
            @csrf
            <input type="hidden" name="bookId" value="{{ $book->id }}">
            <input type="hidden" name="quantity" value="1">
            <button type="submit">
                <i class="fa-sharp fa-solid fa-basket-shopping" data-id="{{ $book->id }}"></i>
            </button>
        </form>
    </div>
</div>

<!-- footer -->
@include('footer')