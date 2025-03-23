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

    <button id="theme-switch">
     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg>
     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
    </button>

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
     <div class="join-us-container">
    <h2>Become a Part of PageTurner!</h2>
    <p>Join our community of book lovers and get access to an extensive collection of books:</p>

    <div class="join-us-form">
        <label for="login-email">Email:</label>
        <input type="email" id="login-email" name="email" required>
        <a href="{{ route('login') }}" class="join-us-btn">Join Us</a>
    </div>
</div>
</body>

@include('footer')
</html>
