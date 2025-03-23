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
    <div class="reviews-section">
        <div class="reviews-header">
            <h2>Reviews for "PlaceHolder"</h2>
        </div>
        <div class="review-item">
            <p class="review-title">"Title Placeholder"</p>
            <p class="review-author">by Placeholder Name</p>
            <p class="review-text">PlaceHolder Description</p>
            <div class="review-rating">★★★★★</div>
        </div>
    </div>

    <!-- Book Display and Purchase -->
    <div class="book-container">
        <div class="book-details">
            <img src="images/book1.jpg" alt="Book Cover" class="book-image">
            <h2 class="book-title">Title Placeholder</h2>
            <p class="book-genre">Genre</p>
            <p class="book-author">Author</p>
            <p class="book-price">Price</p>
            <div class="review-rating">★★★★★</div>
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
    <form>
        <div class="rating-section">
            <label for="rating">Rate this book:</label>
            <div class="stars">
                <input type="radio" id="star5" name="rating" value="5"><label for="star5">★</label>
                <input type="radio" id="star4" name="rating" value="4"><label for="star4">★</label>
                <input type="radio" id="star3" name="rating" value="3"><label for="star3">★</label>
                <input type="radio" id="star2" name="rating" value="2"><label for="star2">★</label>
                <input type="radio" id="star1" name="rating" value="1"><label for="star1">★</label>
            </div>
        </div>
        <div class="form-group">
            <label for="review-title">Title:</label>
            <input type="text" id="review-title" name="review_title" required>
        </div>
        <div class="form-group">
            <label for="review-text">Review:</label>
            <textarea id="review-text" name="review_text" required></textarea>
        </div>
        <button type="submits">Submit Review</button>
    </form>
</div>

    


