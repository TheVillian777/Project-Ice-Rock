<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/index.css" onerror="alert('CSS file not found!')">
    <script src="index.js" defer></script>
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
        @foreach ($categories->unique('name') as $category)
        <form action="{{ route('navigateShop') }}" method="POST">
            @csrf
            <div class="genre-icon">
                <input type="hidden" value="{{ $category->id }}" name="genre-select">
                <button type="submit">
                    <!-- Ensure correct genre images are displayed -->
                    <img src="images/{{ strtolower(str_replace(' ', '-', $category->name)) }}.png" alt="{{ $category->name }}">
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
            <h2 class="showcase-title">Our Best
                <!--Non-Fiction--> Seller Books</h2>
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
</html>

