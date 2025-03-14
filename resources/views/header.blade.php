<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/header.css" onerror="alert('CSS file not found!')">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

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
