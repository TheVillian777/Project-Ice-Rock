<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="css/book_card.css" onerror="alert('CSS file not found!')">
    <script src="shop_saved.js" defer></script>
    <script type="text/javascript" src="darkmode.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

@foreach ($books as $book)
    <div class="book-card">
        
        <!-- cover -->
        <div class="book-cover">
            <a href="{{ route('listing', ['book_id' => $book->id]) }}">
                <img src="{{ asset('images/' . $book->img_url) }}" alt="Book Cover">
            </a>
        </div>

        <!-- title -->
        <div class="book-title">
            <h3>{{ $book->book_name }}</h3>
        </div>

        <!-- author -->
        <div class="book-author">
            <p>{{ $book->author->first_name . " " . $book->author->last_name }}</p>
        </div>

        <!-- price -->
        <div class="book-price">
            <p>£{{ $book->book_price }}</p>
        </div>
        
        @php
        $averagerating = 0;
        $total = 0;
        foreach ($reviews as $review) {
            if ($review['book_id'] == $book->id) {
                $total = $total + 1;
                $averagerating = $averagerating + $review('review_rating');
            }
        }
        if (!$averagerating == 0) {
            $averagerating = $averagerating / $total;
        }
        @endphp

        <input type="hidden" name="rating" value="{{ $averagerating }}">

        <!-- bookmark icon (backend would you add a route after you've made a working wishlist? -->
        <div class="bookmark-icon">
            <button class="bookmark" onclick="location.href='{{ route('wishing', ['book_id' => $book->id]) }}';">
                <i class="fas fa-bookmark save-bookmark" 
                -author="{{ $book->author->first_name . ' ' . $book->author->last_name }}" 
                data-image="{{ asset('images/' . $book->img_url) }}">
                </i>
            </button>
        </div>

        <!-- basket icon -->
        <div class="basket-icon">
            <form action="{{ route('addToBasket') }}" method="POST" class="basket-form">
                @csrf
                <button class="basket"><i class="fa-sharp fa-solid fa-basket-shopping" data-id="{{ $book->id }}"></i>
                <input type="hidden" name="bookId" value="{{ $book->id }}">
                <input type="hidden" name="quantity" value="1">
            </form>
        </div>
        
    </div>  
@endforeach
