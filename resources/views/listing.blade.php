<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/listing.css') }}">
    <script type="text/javascript" src="darkmode.js" defer></script>
    <title>Book Listing</title>
</head>
<body>
<!-- header -->
@include('header')
 
<!-- dark mode -->
<button id="theme-switch">
<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg>
<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
</button>

<div class="container">
    <div class="listing">
        <div class="cover">  
            <img class="book-cover" src="{{ asset('images/' . $book->img_url) }}" alt="Book Cover">
        </div>

        <div class="product-info">
            <h1>{{ $book->book_name }}</h1>
            <h2>{{ $book->author->first_name . " " . $book->author->last_name }}</h2>
            <h3>£{{ $book->book_price }}</h3>
            <div class="review-rating">Rated: {{ number_format($book->averageRating,1) }} /5</div><!-- displays average rating /5 to one decimal points-->
            <p>{{ $book->book_description }} sample text sample text sample text sample text sample text sample text sample text sample text </p>
            
            <div class="basket-icon">
            <form action="{{ route('addToBasket') }}" method="POST" class="basket-form">
                @csrf
                <input type="hidden" name="bookId" value="{{ $book->id }}">

                <label for="quantity-{{ $book->id }}">Quantity:</label>
                <input type="number" id="quantity-{{ $book->id }}" name="quantity" value="1" min="1">

                <button type="submit" class="basket-button">
                    Add to basket! <i class="fa-sharp fa-solid fa-basket-shopping" data-id="{{ $book->id }}"></i>
                </button>
            </form>
            </div>
            <div class="See-Reviews">
                <a href="{{ route('seeReviews', ['book_id' => $book->id]) }}">See Reviews</a>
            </div>
            

        </div>
    </div>

    
 <!-- Review Form -->
<div class="leave-review-container">
    <h2>Write Your Review</h2>
    <form action="{{ route('reviewSubmit') }}" method="POST">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">

        <div class="rating-section">
            <label for="review_rating">Rate this book:</label>
            <div class="stars">
                <input type="radio" id="star5" name="review_rating" value="5" ><label for="star5" title="5 stars">★</label>
                <input type="radio" id="star4" name="review_rating" value="4" ><label for="star4" title="4 stars">★</label>
                <input type="radio" id="star3" name="review_rating" value="3"><label for="star3" title="3 stars">★</label>
                <input type="radio" id="star2" name="review_rating" value="2"><label for="star2" title="2 stars">★</label>
                <input type="radio" id="star1" name="review_rating" value="1"><label for="star1" title="1 star">★</label>
            </div>
        </div>
        <div class="form-group">
            <label for="review_title">Add a title for your review:</label>
            <input type="text" id="review_title" name="review_title" required>
        </div>
        <div class="form-group">
            <label for="review-text">Write your review:</label>
            <textarea id="review_text" name="review_text" maxlength="2000" required></textarea>
        </div>
        <button type="submits">Submit Review</button>
    </form>

</div>
</body>
</div>

</body>

<!-- footer -->
@include('footer')
 