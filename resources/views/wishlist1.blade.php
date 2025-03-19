<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whishlist</title>
    <link rel="stylesheet" href="css/profile.css" onerror="alert('CSS file not found!')">
    <script src="contact.js" defer></script>
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

    <!-- Possible features of Profile Page -->

    <!-- 1. Username
         2. Change Password
         3. Shipping Address
         4. Past books purchased
         5. Maybe past reviews?
    -->


    <div class = "sideBar">
    <h2>Account information</h2>
    <ul>
        <li><a href="{{ route('profile') }}">Your profile</a></li>
        <li><a href="">Past orders</a></li>
        <li><a href="saved">Favourites</a></li>
        <li><a href="">Payment options</a></li>
        <li><a href="">Your address</a></li>
    </ul>

    </div>

    <div class="wishlist-section">
        <h2><em>My Wish List</em> - 2 books</h2>
        <div class="wishlist-list">
            <div class="wish-item">
                <div class="wish-cover">
                    <img src="images/book1.jpg" alt="PlaceHolder">
                </div>
                <div class="wish-details">
                    <h3>PlaceHolder</h3>  <!-- Placeholder for book title -->
                    <p class="author">PlaceHolder</p> <!-- Placeholder for author -->
                    <p class="price">&pound;9.99</p>
                    <a href="#" class="remove">Remove</a>
                </div>
            </div>

            <div class="wish-item">
                <div class="wish-cover">
                    <img src="images/book1.jpg" alt="PlaceHolder">
                </div>
                <div class="wish-details">
                    <h3>PlaceHolder</h3>
                    <p class="author">PlaceHolder</p>
                    <p class="price">&pound;9.99</p>
                    <a href="#" class="remove">Remove</a>
                </div>
            </div>
        </div>



</body>
</html>
