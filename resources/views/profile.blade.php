<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
        <li><a href="">Favourites</a></li>
        <li><a href="">Payment options</a></li>
        <li><a href="">Your address</a></li>
    </ul>

    </div>

    <div class = "profileInfo">
        <h2>Your profile</h2>
        <h3>Start your journey here! Share your information for faster checkouts and amend it anytime!</h3>

    <form action="#" method="POST">
        <label for="title">Title:</label>
        <select id="title" name="title">
            <option value="Mr">Mr</option>
            <option value="Mrs">Mrs</option>
            <option value="Miss">Miss</option>
            <option value="Ms">Ms</option>
            <option value="Dr">Dr</option>
            <option value="Prof">Prof</option>
            <option value="Other">Other</option>
        </select>

        <div class="name-input">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" placeholder="Enter your first name">
        </div>

        <div class="name-input">
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" placeholder="Enter your last name">
        </div>

        <div class="name-input">
            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number">
        </div>

        <div class="name-input">
            <label for="email">Current Email Address:</label>
            <input type="text" id="email" name="email" placeholder="PageTurner@gmail.com">
        </div>

        <div class="changePassword">
            <p>Would you like to change your password?</p>
        </div>

        <div class="name-input">
            <label for="currentPassword">Current Password:</label>
            <input type="password" id="currentPassword" name="currentPassword" placeholder="Enter your current password">
        </div>

        <div class="name-input">
            <label for="newPassword">New Password:</label>
            <input type="password" id="newPassword" name="newPassword" placeholder="Enter your new password">
        </div>

        <div class="name-input">
            <label for="confirmPassword">Confirm New Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Re-enter your new password">
        </div>

        <button type="submit" class="confirm-button">Confirm</button>

    </form>
    </div>

</body>
</html>
