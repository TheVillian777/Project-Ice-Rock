<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/basket.css">
    <script src="basket.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Basket</title>
</head>
<body>
    <h1>done shopping?</h1> 
    <div class="main-container">
            <div class="basket-container">
                <h2>basket:</h2>

                <!-- basket card (book cover, title, author, quantity with arrows, price) -->
                <div class="basket-card">
                    <!-- cover -->
                    <img src="book1.jpg" alt="Book Cover" class="book-cover">
                    <!-- title, author -->
                    <div class="book-info">
                        <p class="title">Book Title</p>
                        <p class="author">Author Name</p>
                    </div>
                    <div class="spacer"></div>
                    <!-- price -->
                    <p class="price">£8</p>
                    <!-- qty -->
                    <div class="quantity">
                        <button class="arrow down">-</button>
                        <input type="number" value="1" min="1" class="quantity-input">
                        <button class="arrow up">+</button>
                    </div>
                </div>
                
                <div class="basket-card">
                    <img src="book2.jpg" alt="Book Cover" class="book-cover">
                    <div class="book-info">
                        <p class="title">Book Title</p>
                        <p class="author">Author Name</p>
                    </div>
                    <div class="spacer"></div>
                    <p class="price">£8</p>
                    <div class="quantity">
                        <button class="arrow down">-</button>
                        <input type="number" value="1" min="1" class="quantity-input">
                        <button class="arrow up">+</button>
                    </div>
                </div>


            </div>
            <div class="checkout-container">
                <h2>checkout:</h2>

            </div>
    </div>
</body>
</html>