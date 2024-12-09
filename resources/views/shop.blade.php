<!DOCTYPE html>
<html lang="en">

<!-- stylesheet, javascript, bookmark icon -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <link rel="stylesheet" href="css/shop_saved.css" onerror="alert('CSS file not found!')">
    <script src="shop_saved.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>

<!-- holds all content -->
<div class="store-container">

    <!-- header, search bar -->
    <header>
        <h1>browse our books...</h1>
        <form action="{{ route('shopSearch') }}" method="POST">
            @csrf
            <div class="search-bar">
                <input type="text" name='search' placeholder="search for books..." id="search" value="{{ request()->input('search') }}">
                <button type="submit" id="search-button">search!</button>
                <a href="basket">
                    <img src="basket.jpg" alt="cart" class="shopping-cart"> 
                </a>
            </div>   
        </form>
    </header>

    <div class="navBar">
        <a class="active" href="index">Home</a>
        <a href="shop">Books</a>
        <a href="saved">Saved</a>
        <a href="aboutUs">About Us</a>
        <a href="contact">Contact Us</a>
    </div>
    <main>
        
    <main>

    <!-- side bar with filters -->
    <aside class="filters">
    <h2>filters:</h2>
    <form action = "{{ route('shopFilter') }}" method="POST">
        @csrf
        <div class="filter-section">
            <!-- genre filters -->
             <h3>genre</h3>
             <ul>
                @foreach ($categories as $category)
                <li><input type="checkbox" value="{{ $category->id }}" name="options[]"> <label for="{{ $category->name }}"> {{ $category->name }}</label></li>
                @endforeach
            </ul>
        </div>
        <!-- price filter (sliding range) -->
         <div class="filter">
            <label for="priceRange">Max Price:</label>
            <input type="range" id="priceRange" name="priceRange" min="0" max="25" value="{{ request()->input('priceRange', 0) }}">
            <span id="priceValue">£0</span>
        </div>
        <!-- filter by rating -->
         <div class="filter-section">
            <h3>ratings</h3>
            <div class="star-rating">
                <span class="star" data-value="1">★</span>
                <span class="star" data-value="2">★</span>
                <span class="star" data-value="3">★</span>
                <span class="star" data-value="4">★</span>
                <span class="star" data-value="5">★</span>
            </div>
        </div>
        <div class='search-bar'><button type="submit" id="filter-button">filter!</button></div>
    </form>
    </aside>


        <!-- main content (book grid) -->
        <section class="book-grid">

        <!-- defining a book card -->
        @foreach ($books as $book)
        <div class="book-card">
            <img src="{{ asset($book->img_url) }}" alt="book cover">
            <h3>{{ $book->book_name }} <i class="fas fa-bookmark save-bookmark" data-title="{{ $book->book_name }}" data-author='{{ $book->author->first_name . " " . $book->author->last_name }}' data-image="{{ asset($book->img_url) }}"></i></h3>
            <p>{{ $book->author->first_name . " " . $book->author->last_name }}</p>
        </div>
        @endforeach
        </section>
        </main>
    </div>      
</body>
</html>