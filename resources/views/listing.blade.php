<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/listing.css">
    <script src="listing.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Product Listing</title>
</head>
<body>
    <div class="main-container">
        <div class="cover-container">
            <div class="book-cover">
                <img src="images/book1.jpg" alt="Book Cover">
            </div>

            <div class="genre-text">
                genre
            </div>
        </div>

        <div class="info-container">
            <div class="book-title">
                <h2>TITLE</h2>
            </div>

            <div class="author">
                <p>AUTHOR</p>
            </div>

            <div class="publish-date">
                <p>PUBLISH-DATE</p>
            </div>

            <div class="book-description">
                <p>BOOK DESCRIPTION BOOK DESCRIPTION BOOK DESCRIPTION BOOK DESCRIPTION BOOK DESCRIPTION BOOK DESCRIPTION BOOK DESCRIPTION BOOK DESCRIPTION BOOK DESCRIPTION BOOK DESCRIPTION BOOK DESCRIPTION BOOK DESCRIPTION BOOK DESCRIPTION BOOK DESCRIPTION </p>
            </div>

        </div>

        <div class="basket-container">
            <div class="price">
                <p>£PRICE</p>
            </div>

            <div class="quantity">
                <label for="quantity">quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
            </div>
            
            <div class="add-to-basket">
                <button class="add-to-cart-btn"><i class="fa-sharp fa-solid fa-basket-shopping"></i> add to basket</button>
            </div>
        </div>
    </div>
</body>
</html>
