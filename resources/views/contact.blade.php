<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/contact.css" onerror="alert('CSS file not found!')">
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
        <a href="{{ route('index') }}">Home</a>
        <a href="{{ route('shop') }}">Books</a>
        <!--<a href="{{ route('saved') }}">Saved</a>-->
        <a href="{{ route('basket') }}">Basket</a>
        <a href="{{ route('login') }}">Profile</a>
        <a href="{{ route('aboutUs') }}">About Us</a>
        <a  class="active" href="{{ route('contact') }}">Contact Us</a>
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

    <!-- Contact Section -->
    <div class="contact-section">
        <h1>We are here to help!</h1>
        <p>Let us know how we can best help you. Use the contact form below to email us. It's an honor to support you.</p>

        <form class="contact-form" action="{{ route('contactUs') }}" method="post">
            @csrf
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email_address" placeholder="Email" required>
            <input type="tel" name="phone_number" placeholder="Phone Number" required>
            <textarea name="description" rows="5" placeholder="Description"></textarea>
            <button type="submit">Send Message</button>

            @if(session()->has('success'))
                <p id="sucess" style="color:gold; font-weight: bold;">
                {{ session('success') }}
                </p>
            @endif
        </form>
    </div>

    @include('footer')

<script>
    //if the success message appears this shows the user for 4 seconds then routes back to shop
    @if(session()->has('success'))
        const displayMessageTime = 4000;
        setTimeout(function() {
            const successMessage = document.getElementById('success')
            if (successMessage) {
                successMessage.style.display = 'none'
            }
            window.location.href = "{{ route('shop') }}"
        }, displayMessageTime);
    @endif
</script>

</body>
</html>
