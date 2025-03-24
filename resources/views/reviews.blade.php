<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/css/reviews.css">
    <script src="js/reviews.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<header class="new-header">
    <div class="logo">
        <img src="images/logo.png" alt="Logo">
        <h1>PageTurner</h1>
    </div>

    <div class="search-box">
        <form action="{{ route('shopSearch') }}" method="POST">
            @csrf
            <div class="search-bar">
                <input type="text" name='search' placeholder="Search for books..." id="search" value="{{ request()->input('search') }}">
                <button type="submit" class="search-icon">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>

    <div class="header-right">
        <div class="account-dropdown">
            <a href="#" class="account-button">
                <i class="fa fa-user"></i> ACCOUNT
            </a>
            <div class="account-dropdown-content">
                <form action="{{ route('login') }}" method="GET">
                    @csrf
                    <button type="submit">Sign In</button>
                </form>
                <div class="dropdown-divider"></div>
                <form action="{{ route('register') }}" method="GET">
                    @csrf
                    <button type="submit">Register</button>
                </form>
            </div>
        </div>

        <!-- Wishlist Button -->
        <div class="wishlist-button">
            <a href="{{ route('saved')}}">
               <i class="fa fa-heart"></i> WISHLIST
            </a>
        </div>

        <!-- Basket Button -->
        <div class="basket-button-container">
            <a href="{{ route('basket') }}" class="basket-button">
                <i class="fa fa-shopping-basket"></i> £0.00
            </a>
        </div>

    </div>
</header>

<!-- Navigation Bar -->
<div class="navBar">
    <a class="active" href="{{ route('index') }}">Home</a>

    <!-- Account Dropdown backend can you route this to the correct pages -->
    <div class="dropdown">
            <a href="{{ route('shop') }}">Books</a>
            <div class="dropdown-content">
                <form action="{{ route('navigateShop') }}" method="POST">
                    @csrf
                    <input type="hidden" value="1" name="genre-select">
                    <button type="submit">Fantasy</button>
                </form>
                <form action="{{ route('navigateShop') }}" method="POST">
                    @csrf
                    <input type="hidden" value="2" name="genre-select">
                    <button type="submit">Horror</button>
                </form>
                <form action="{{ route('navigateShop') }}" method="POST">
                    @csrf
                    <input type="hidden" value="3" name="genre-select">
                    <button type="submit">Mystery</button>
                </form>
                <form action="{{ route('navigateShop') }}" method="POST">
                    @csrf
                    <input type="hidden" value="4" name="genre-select">
                    <button type="submit">Crime</button>
                </form>
                <form action="{{ route('navigateShop') }}" method="POST">
                    @csrf
                    <input type="hidden" value="5" name="genre-select">
                    <button type="submit">Biography</button>
                </form>
            </div>
        </div>
        <a href="{{ route('aboutUs') }}">About Us</a>
        <a href="{{ route('contact') }}">Contact Us</a>
        @if (Auth::check())
        <form action="{{ route('logout')}}" method="POST">
            @csrf
            <button type="submit">Log Out</button>
        </form>
        @else
        @endif
    </div>


<!-- Reviews Section -->
<div class="reviews-container">
    @if ($reviews->isEmpty())
        <div class="review-title">
            <H2>Be the First to leave a review!</h2> 
        </div>
    @else
    <div class="reviews-header">
        <h2>Reviews for "{{ $book->book_name }}"</h2>
    </div>
        @foreach ($reviews as $review)
        <div class="reviews-section">
            <div class="review-item">
                <p class="review-title">"{{ $review->review_title }}"</p>
                <p class="review-author">by {{ $review->user->first_name . " " . $review->user->last_name}}</p>
                <div class="review-rating">Rated: {{ number_format($review->review_rating,1) }} /5</div>
                <p class="review-text">{{ $review->review_text }}</p>
            </div>
        </div>
        @endforeach
    @endif
</div>


    <!-- Book Display and Purchase -->
    <div class="book-container">
        <div class="book-details">
            <img src="{{ asset('images/' . $book->img_url) }}" alt="Book Cover" class="book-image">
            <h2 class="book-title">{{ $book->book_name }}</h2>
            <p class="book-author">{{ $book->author->first_name . " " . $book->author->last_name }}</p>
            <p class="book-price">£{{ $book->book_price }}</p>
            <div class="review-rating">Rated: {{ number_format($averageRating,1) }} /5</div><!-- displays average rating /5 to one decimal points-->
        </div>
        <div class="purchase-container">
            <button class="add-to-basket">Add to Basket</button>
            <button class="add-to-wishlist">Add to Wishlist</button>
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
        <button type="submit">Submit Review</button>
    </form>

    </div>

    


