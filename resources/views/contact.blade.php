<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="contact.css">
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
        <a href="index">Home</a>
        <a href="shop">Books</a>
        <a href="saved">Saved</a>
        <a href="aboutUs">About Us</a>
        <a class="active" href="contact">Contact Us</a>
    </div>

    <!-- Contact Section -->
    <div class="contact-section">
        <h1>We are here to help!</h1>
        <p>Let us know how we can best help you. Use the contact form below to email us. It's an honor to support you.</p>

        <form class="contact-form">

            <input type="text" name="first-name" placeholder="First Name" required>
            <input type="text" name="last-name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="phone" placeholder="Phone Number" required>
            <textarea name="message" rows="5" placeholder="Description"></textarea>
            <button type="submit">Send Message</button>

        </form>
    </div>

</body>
</html>
