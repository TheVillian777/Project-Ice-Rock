<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AboutUs</title>
    <link rel="stylesheet" href="css/aboutUs.css">
    <script src="{{ asset('js/aboutus.js') }}" defer></script>
    <script type="text/javascript" src="darkmode.js" defer></script>
    <title>PageTurner</title>

</head>

<body>

@include('header')

    <!-- about us section -->
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
        <a href="{{ route('login') }}" class="join-us-btn">Join Us</a>
    </div>
</div>

@include('footer')

</body>
</html>
