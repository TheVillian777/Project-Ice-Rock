<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css" onerror="alert('CSS file not found!')">
    <script src="https://cdn.tailwindcss.com"></script>
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

<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <h2 class="text-2xl font-semibold mb-4">Your Profile</h2>

    <!-- Username Section -->
    <div class="mb-6">
        <label class="block text-gray-700 font-semibold mb-2">Username</label>
        <div class="flex gap-2">
            <input type="text" value="name logged in" class="w-full border px-3 py-2 rounded-lg">
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg">Edit</button>
        </div>
    </div>

    <!-- Change Password -->
    <div class="mb-6">
        <label class="block text-gray-700 font-semibold mb-2">Change Password</label>
        <input type="password" placeholder="New Password" class="w-full border px-3 py-2 rounded-lg mb-2">
        <button class="bg-green-600 text-white px-4 py-2 rounded-lg">Update Password</button>
    </div>

    <!-- Shipping Address -->
    <div class="mb-6">
        <label class="block text-gray-700 font-semibold mb-2">Shipping Address</label>
        <textarea class="w-full border px-3 py-2 rounded-lg" rows="3">123 street address</textarea>
        <button class="bg-yellow-600 text-white px-4 py-2 mt-2 rounded-lg">Update Address</button>
    </div>

    <!-- Past Book Purchases -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-2">Past Purchases</h3>
        <ul class="space-y-2">
            <li class="border p-3 rounded-lg bg-gray-100">📖 <strong>book</strong> - date</li>
            <li class="border p-3 rounded-lg bg-gray-100">📖 <strong>book</strong> - date</li>
        </ul>
    </div>

    <!-- Past Reviews -->
    <div>
        <h3 class="text-xl font-semibold mb-2">Your Reviews</h3>
        <ul class="space-y-2">
            <li class="border p-3 rounded-lg bg-gray-100">
                <strong>book</strong>
                <p class="text-gray-700">"review"</p>
                <span class="text-sm text-gray-500">date posted</span>
            </li>
            <li class="border p-3 rounded-lg bg-gray-100">
                <strong>another book</strong>
                <p class="text-gray-700">"another review"</p>
                <span class="text-sm text-gray-500">another date posted</span>
            </li>
        </ul>
    </div>
</div>


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
