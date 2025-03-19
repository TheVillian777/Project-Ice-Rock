<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/index.css" onerror="alert('CSS file not found!')">
    <script src="index.js" defer></script>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
        </div>
        <div class="title">
            <h1>PageTurner</h1>
        </div>
        
    </header>

    <!-- Search Bar -->
     
    <div class="search-box">
        <form action="{{ route('shopSearch') }}" method="POST">
            @csrf
            <div class="search-bar">
                <input type="text" name='search' placeholder="search for books..." id="search" value="{{ request()->input('search') }}">
                <button type="submit"><img src="magnifying-glass.png" alt="Search" class="search-icon"></button>
            </div>   
        </form>
        <!--<input type="text" placeholder="Search for books..." id="search-bar">
        <img src="magnifying-glass.png" alt="Search" class="search-icon">-->

    </div>

    <!-- Navigation Bar -->
    <div class="navBar">
        <a class="active" href="{{ route('index') }}">Home</a>
        <a href="{{ route('shop') }}">Books</a>
        <!--<a href="{{ route('saved') }}">Saved</a>-->
        <a href="{{ route('basket') }}">Basket</a>
        <a href="{{ route('profile') }}">Profile</a>
        <a href="{{ route('aboutUs') }}">About Us</a>
        <a href="{{ route('contact') }}">Contact Us</a>
        <a href="{{ route('profile') }}">Profile</a>
        @if (Auth::check())
        <form action="{{ route('logout')}}" method="POST">
            @csrf
        <button type="submit">Log Out</button>
        </form>
        @else 
        <a href="{{ route('login') }}">Login</a>
        </form>
        @endif
    </div>
    <!-- Image placeholder -->
    <div class="image-slider">
    <div class="slider-container">
        <div class="slide">
            <img src="images/image-slide1.png" alt="Slide 1">
        </div>
        <div class="slide">
            <img src="images/image-slide2.png" alt="Slide 2">
        </div>
        <div class="slide">
            <img src="images/image-slide3.png" alt="Slide 3">
        </div>
    </div>
    <!-- Arrows for manual scrolling -->
    <button class="prev-arrow">&#10094;</button>
    <button class="next-arrow">&#10095;</button>
</div>



<!-- Book showcase -->
<div class="book-slider">

    <!-- Top right "See More" link-->
    <div class="showcase-header">
        <h2 class="showcase-title">Our Showcase</h2>
        <a href="{{ route('shop') }}" class="see-more">See More</a>
    </div>
    
    <button class="book-prev-arrow">&#10094;</button>
    <div class="book-slider-container">
        @foreach ($books as $book)
        <div class="book-slide">
            <img src="{{ asset('images/' . $book->img_url)}} " alt="Book Cover">
            <h3>{{ $book->book_name}}</h3> <!-- Book Name -->
            <p>{{ $book->author->first_name . " " . $book->author->last_name }}</p> <!-- Author Name -->
            <p class="price">£{{ $book->book_price}}</p> <!-- Price of book -->
            <div class="hover-popup">Add to Basket</div> <!-- Add to basket popup -->
        </div>
        @endforeach

<!-- Arrows for the book showcase -->   
    </div>
    <button class="book-next-arrow">&#10095;</button>
</div>


<!-- Divider Line -->
<div class="section-divider"></div>

<!-- Genre Icons Section -->
<div class="genre-icons">
    @foreach ($categories as $category)
    <form action="{{ route('navigateShop') }}" method="POST">
        @csrf
        <div class="genre-icon">
            <input type="hidden" value="{{ $category->id }}" name="genre-select">
            <button type="submit">
                <img src="images/{{ $category->img_url }}" alt="{{ $category->name }}">
                <p>{{$category->name}}</p>
            </button>
        </div>
    </form>
    @endforeach
</div>

<!-- Divider Line -->
<div class="section-divider"></div>

<!-- Banner Section -->
<div class="banner-section">
    <img src="images/banner.png" alt="Promotional Banner">
</div>

<!-- Divider Line -->
<div class="section-divider"></div>

<!-- Second Book Showcase -->
<div class="book-slider">
    <!-- Top right "See More" link-->
    <div class="showcase-header">
        <h2 class="showcase-title">Our Best <!--Non-Fiction--> Seller Books</h2>
        <a href="{{ route('shop') }}" class="see-more">See More</a>
    </div>

    <button class="book-prev-arrow">&#10094;</button>
    <div class="book-slider-container">
        @foreach ($books->take(5) as $book)
        <div class="book-slide">
            <img src="{{ asset('images/' . $book->img_url)}} " alt="Book Cover">
            <h3>{{ $book->book_name}}</h3> <!-- Book Name -->
            <p>{{ $book->author->first_name . " " . $book->author->last_name }}</p> <!-- Author Name -->
            <p class="price">£{{ $book->book_price}}</p> <!-- Price of book -->
            <div class="hover-popup">Add to Basket</div> <!-- Add to basket popup -->
        </div>
        @endforeach
    </div>
    <button class="book-next-arrow">&#10095;</button>
</div>

<!-- Divider Line -->
<div class="section-divider"></div>

<?php /*
<!-- Third Book Showcase -->
 <div class="book-slider">
    <!-- Top right "See More" link-->
    <div class="showcase-header">
        <h2 class="showcase-title">Staff Favorites</h2>
        <a href="shop" class="see-more">See More</a>
    </div>

    <button class="book-prev-arrow">&#10094;</button>
    <div class="book-slider-container">
        <div class="book-slide">
            <img src="book12.jpg" alt="Book 12">
            <h3>PLACEHOLDER</h3>
            <p>PLACEHOLDER</p>
            <p class="price">PLACEHOLDER</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="book13.jpg" alt="Book 13">
            <h3>PLACEHOLDER</h3>
            <p>PLACEHOLDER</p>
            <p class="price">PLACEHOLDER</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="book14.jpg" alt="Book 14">
            <h3>PLACEHOLDER</h3>
            <p>PLACEHOLDER</p>
            <p class="price">PLACEHOLDER</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="book15.jpg" alt="Book 15">
            <h3>PLACEHOLDER</h3>
            <p>PLACEHOLDER</p>
            <p class="price">PLACEHOLDER</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="book16.jpg" alt="Book 16">
            <h3>PLACEHOLDER</h3>
            <p>PLACEHOLDER</p>
            <p class="price">PLACEHOLDER</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
    </div>
    <button class="book-next-arrow">&#10095;</button>
</div>

<!-- Divider Line -->
<div class="section-divider"></div>
*/ ?>
<!-- Banner Section -->
<div class="banner-section">
    <img src="images/banner.png" alt="Promotional Banner">
</div>

<!-- Divider Line -->
<div class="section-divider"></div>

</body>
@include('footer')
</html>