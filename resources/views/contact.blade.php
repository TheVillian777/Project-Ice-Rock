<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="contact.css">
    <script src="contact.js" defer></script>
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
    <div class="search-box">

        <input type="text" placeholder="Search for books..." id="search-bar">
        <img src="magnifying-glass.png" alt="Search" class="search-icon">

    </div>

    <!-- Navigation Bar -->
    <div class="navBar">
        <a href="{{ route('index') }}">Home</a>
        <a href="{{ route('shop') }}">Books</a>
        <!--<a href="{{ route('saved') }}">Saved</a>-->
        <a href="{{ route('aboutUs') }}">About Us</a>
        <a  class="active" href="{{ route('contact') }}">Contact Us</a>
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
