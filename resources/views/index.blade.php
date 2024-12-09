<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/index.css">
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

    <!-- Top right "See More" link-->
    <div class="showcase-header">
        <h2 class="showcase-title">Our Showcase</h2>
        <a href="shop" class="see-more">See More</a>
    </div>
    
    <button class="book-prev-arrow">&#10094;</button>
    <div class="book-slider-container">
        <div class="book-slide">
            <img src="images/book1.jpg" alt="Book 1">
            <h3>The Master and Margarita</h3> <!-- Book Name -->
            <p>Mikhail Bulgakov</p> <!-- Author Name -->
            <p class="price">£20.00</p> <!-- Price of book -->
            <div class="hover-popup">Add to Basket</div> <!-- Add to basket popup -->
        </div>
        <div class="book-slide">
            <img src="images/book2.jpg" alt="Book 2">
            <h3>Naked Lunch</h3>
            <p>William S. Burroughs</p>
            <p class="price">£20.00</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="images/book3.jpg" alt="Book 3">
            <h3>The Stranger</h3>
            <p>Albert Camus</p>
            <p class="price">£20.00</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="images/book4.jpg" alt="Book 4">
            <h3>The Origins of Totalitarianism</h3>
            <p>Hannah Arendt</p>
            <p class="price">£20.00</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="images/book5.jpg" alt="Book 5">
            <h3>Food and Cooking</h3>
            <p>Harold McGee</p>
            <p class="price">£20.00</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="images/book6.jpg" alt="Book 6">
            <h3>The Handmaid's Tale</h3>
            <p>Margaret Atwood</p>
            <p class="price">£20.00</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="images/book4.jpg" alt="Book 4">
            <h3>The Origins of Totalitarianism</h3>
            <p>Hannah Arendt</p>
            <p class="price">£20.00</p>
            <div class="hover-popup">Add to Basket</div>
        </div>


<!-- Arrows for the book showcase -->   
    </div>
    <button class="book-next-arrow">&#10095;</button>
</div>


<!-- Divider Line -->
<div class="section-divider"></div>

<!-- Genre Icons Section -->
<div class="genre-icons">
    <div class="genre-icon" onclick="navigateToShop('fiction')"> <!-- Once the genre sort is done! -->
        <img src="images/fiction.png" alt="Fiction">
        <p>Fiction</p>
    </div>
    <div class="genre-icon" onclick="navigateToShop('non-fiction')">
        <img src="images/non-fiction.png" alt="Non Fiction">
        <p>Non Fiction</p>
    </div>
    <div class="genre-icon" onclick="navigateToShop('fantasy')">
        <img src="images/fantasy.png" alt="Fantasy">
        <p>Fantasy</p>
    </div>
    <div class="genre-icon" onclick="navigateToShop('science-fiction')">
        <img src="images/science-fiction.png" alt="Science Fiction">
        <p>Science Fiction</p>
    </div>
    <div class="genre-icon" onclick="navigateToShop('mystery')">
        <img src="images/mystery.png" alt="Mystery">
        <p>Mystery</p>
    </div>
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
        <h2 class="showcase-title">Our Best Non-Fiction Books</h2>
        <a href="shop" class="see-more">See More</a>
    </div>

    <button class="book-prev-arrow">&#10094;</button>
    <div class="book-slider-container">
        <div class="book-slide">
            <img src="book7.jpg" alt="Book 7">
            <h3>PLACEHOLDER</h3>
            <p>PLACEHOLDER</p>
            <p class="price">PLACEHOLDER</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="book8.jpg" alt="Book 8">
            <h3>PLACEHOLDER</h3>
            <p>PLACEHOLDER</p>
            <p class="price">PLACEHOLDER</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="book9.jpg" alt="Book 9">
            <h3>PLACEHOLDER</h3>
            <p>PLACEHOLDER</p>
            <p class="price">PLACEHOLDER</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="book10.jpg" alt="Book 10">
            <h3>PLACEHOLDER</h3>
            <p>PLACEHOLDER</p>
            <p class="price">PLACEHOLDER</p>
            <div class="hover-popup">Add to Basket</div>
        </div>
        <div class="book-slide">
            <img src="book11.jpg" alt="Book 11">
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

<!-- Banner Section -->
<div class="banner-section">
    <img src="images/banner.png" alt="Promotional Banner">
</div>

<!-- Divider Line -->
<div class="section-divider"></div>

</body>
</html>

