<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AboutUs</title>
    <link rel="stylesheet" href="css/aboutUs.css">
    <script src="{{ asset('js/aboutus.js') }}" defer></script>

    <title>PageTurner</title>
    <link rel="stylesheet" href="css/styles.css" onerror="alert('CSS file not found!')">

</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>


        <div class="title">

            <h1>PageTurner</h1>

        </div>
    </header>

    <!-- Search Bar -->
    <h1>
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
        </div>
    </h1>

    <!-- Search bar -->
    <div class="search-box">
        <form action="{{ route('shopSearch') }}" method="POST">
            @csrf
            <div class="search-bar">
                <input type="text" name='search' placeholder="search for books..." id="search" value="{{ request()->input('search') }}">
                <button type="submit"><img src="magnifying-glass.png" alt="Search" class="search-icon"></button>
            </div>   
        </form>
    
    </div>

    <!-- Navigation Bar -->
    <div class="navBar">
        <a href="{{ route('index') }}">Home</a>
        <a href="{{ route('shop') }}">Books</a>
        <!--<a href="{{ route('saved') }}">Saved</a>-->
        <a href="{{ route('basket') }}">Basket</a>
        <a href="{{ route('login') }}">Profile</a>
        <a class="active" href="{{ route('aboutUs') }}">About Us</a>
        <a href="{{ route('contact') }}">Contact Us</a>
        

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

    <!-- about us  Section -->
    <div class="aboutUs-section">
     <h1>About Us</h1>
     <p>Welcome to PageTurner, your go-to platform for finding and purchasing books of all genres.</p>
     <p>We are committed to providing an extensive collection of books while ensuring a seamless user experience.</p>
   
     <h2>Our Story</h2>
     <p>Founded with a passion for literature, PageTurner started as a small bookshop and grew into an online hub for book enthusiasts. We believe that books have the power to inspire, educate, and transport readers to new worlds.</p>
      
     <!-- Read More Button -->
     <button id="readMoreBtn" class="read-more-btn">Read More</button>
     
     <!-- Hidden Content -->
     <div id="moreContent">

     <h2>Why Choose Us?</h2>
     <p>we have vast collection - From bestsellers to hidden gems, we have something for everyone.</p>
     <p>we are easy & secure - A hassle-free experience with safe payment options.</p>

     <h2>Our Commitment</h2>
     <p>At PageTurner, we are committed to promoting the joy of reading and supporting authors and publishers worldwide. Our goal is to make literature accessible and enjoyable for all.</p>

    </div>


</body>
</html>
