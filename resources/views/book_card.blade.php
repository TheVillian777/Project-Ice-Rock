<!DOCTYPE html>
<html lang="en">

<!-- stylesheet, javascript, bookmark icon -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <link rel="stylesheet" href="css/book_card.css" onerror="alert('CSS file not found!')">
    <script src="shop_saved.js" defer></script>
    <script type="text/javascript" src="darkmode.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<!-- defining a book card -->
@foreach ($books as $book)
        <div class="book-card" onclick="window.location='{{ route('listing', ['book_id' => $book->id]) }}'">
            <!-- book cover image -->
            <img src="{{ asset('images/' . $book->img_url) }}" alt="book cover">
            
            <!-- book title and bookmark icon -->
            <h3>
            {{ $book->book_name }} 
            <i class="fas fa-bookmark save-bookmark" 
               data-title="{{ $book->book_name }}" 
               data-author="{{ $book->author->first_name . ' ' . $book->author->last_name }}" 
               data-image="{{ asset('images/' . $book->img_url) }}">
            </i>
            </h3>
            
            <!-- book author -->
            <p>{{ $book->author->first_name . " " . $book->author->last_name }}</p>
            
            <!-- book price -->
            <div class="price">
            <p>£{{ $book->book_price }}</p>
            </div>
            
            <!-- basket icon -->
            <div class="basket-icon">
            <form action="{{ route('addToBasket') }}" method="POST" class="basket-form">
                @csrf
                <input type="hidden" name="bookId" value="{{ $book->id }}">
                <input type="hidden" name="quantity" value="1">
                <i class="fa-sharp fa-solid fa-basket-shopping" data-id="{{ $book->id }}"></i>
                </button>
            </form>
            </div>
        </div>
@endforeach