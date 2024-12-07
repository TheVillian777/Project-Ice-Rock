<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="index.css">
    <script src="index.js" defer></script>
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
        <a class="active" href="index">Home</a>
        <a href="shop">Books</a>
        <a href="saved">Saved</a>
        <a href="aboutUs">About Us</a>
        <a href="contact">Contact Us</a>
    </div>
    <!-- Image placeholder -->
    <div class="image-slider">
    <div class="slider-container">
        <div class="slide">
            <img src="test1.jpg" alt="Slide 1">
        </div>
        <div class="slide">
            <img src="test2.jpg" alt="Slide 2">
        </div>
        <div class="slide">
            <img src="test3.jpg" alt="Slide 3">
        </div>
    </div>
    <!-- Arrows for manual scrolling -->
    <button class="prev-arrow">&#10094;</button>
    <button class="next-arrow">&#10095;</button>
</div>



<!-- Book showcase -->
<div class="book-slider">
    <button class="book-prev-arrow">&#10094;</button>
    <div class="book-slider-container">
        <div class="book-slide">
            <img src="book1.jpg" alt="Book 1">
            <h3>The Master and Margarita</h3> <!-- Book Name -->
            <p>Mikhail Bulgakov</p> <!-- Author Name -->
            <p class="price">£20.00</p> <!-- Price of book -->
            <div class="hover-popup">Add to Basket</div> <!-- Add to basket popup -->
        </div>
        <div class="book-slide">
            <img src="book2.jpg" alt="Book 2">
            <h3>Naked Lunch</h3>
            <p>William S. Burroughs</p>
            <p class="price">£20.00</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="book3.jpg" alt="Book 3">
            <h3>The Stranger</h3>
            <p>Albert Camus</p>
            <p class="price">£20.00</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="book4.jpg" alt="Book 4">
            <h3>The Origins of Totalitarianism</h3>
            <p>Hannah Arendt</p>
            <p class="price">£20.00</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="book5.jpg" alt="Book 5">
            <h3>Food and Cooking</h3>
            <p>Harold McGee</p>
            <p class="price">£20.00</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="book6.jpg" alt="Book 6">
            <h3>The Handmaid's Tale</h3>
            <p>Margaret Atwood</p>
            <p class="price">£20.00</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="book4.jpg" alt="Book 4">
            <h3>The Origins of Totalitarianism</h3>
            <p>Hannah Arendt</p>
            <p class="price">£20.00</p>
            <div class="hover-popup">Add to Basket</div>
        </div>


<!-- Arrows for the book showcase -->   
    </div>
    <button class="book-next-arrow">&#10095;</button>
</div>

</body>
</html>

