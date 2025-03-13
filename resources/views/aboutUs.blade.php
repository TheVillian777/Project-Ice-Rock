<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AboutUs</title>
    <link rel="stylesheet" href="css/aboutUs.css">
    <script src="{{ asset('js/aboutus.js') }}" defer></script>

    <title>PageTurner</title>

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
                   <i class="fa fa-heart"></i>  WISHLIST
                </a>
            </div>

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
     
     <!--join us button-->
    </div>
    <div class="join-us-container">
        <h2>Become a Part of PageTurner!</h2>
        <p>Join our community of book lovers and get access to an extensive collection of books.</p>
        <a href="{{ route('register') }}" class="join-us-btn">Join Us</a>
    </div>
</div>


<footer>
        <div class="footer-container">
            <div class="footer-section">
                <p>&copy; 2025 Ice Rock. All rights reserved.</p>
            </div>
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>Email: contact@icerock.com</p>
                <p>Phone: +1 234 567 890</p>
            </div>
            <div class="footer-section">
                <h3>Legal</h3>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>
</html>
