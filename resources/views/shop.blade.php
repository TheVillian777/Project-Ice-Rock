<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <link rel="stylesheet" href="shop.css" onerror="alert('CSS file not found!')">
    <script src="shop.js" defer></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <link rel="stylesheet" href="shop.css" onerror="alert('CSS file not found!')">
    <script src="shop.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>

<body>
<div class="store-container">
    <header>
        <h1>browse our books...</h1>
        <div class="search-bar">
            <input type="test" placeholder="search for books..." id="search">
            <button type="button" id="search-button">search!</button>
        <div>
    </header>
    <main>

        <!-- side bar with filters -->
    <aside class="filters">
    <h2>filters:</h2>
    <div class="filter-section">
        <h3>genre</h3>
        <ul>
            <li><input type="checkbox" id="fiction"> <label for="fiction">fiction</label></li>
            <li><input type="checkbox" id="non-fiction"> <label for="non-fiction">non fiction</label></li>
            <li><input type="checkbox" id="fantasy"> <label for="fantasy">fantasy</label></li>
            <li><input type="checkbox" id="science-fiction"> <label for="science-fiction">science fiction</label></li>
            <li><input type="checkbox" id="mystery"> <label for="mystery">mystery</label></li>
        </ul>
    </div>
    <div class="filter">
        <label for="priceRange">Max Price:</label>
        <input type="range" id="priceRange" min="0" max="100" value="50">
        <span id="priceValue">£50</span>
    </div>

        <div class="filter-section">
            <h3>ratings</h3>
            <div class="star-rating">
                <span class="star" data-value="1">★</span>
                <span class="star" data-value="2">★</span>
                <span class="star" data-value="3">★</span>
                <span class="star" data-value="4">★</span>
                <span class="star" data-value="5">★</span>
            </div>

        </div>
    </aside>


        <!-- main content (book grid) -->
        <section class="book-grid">
        <div class="book-card">
            <img src="book1.jpg" alt="book cover">
            <h3>The Master and Margarita <i class="fas fa-bookmark save-bookmark" data-title="The Master and Margarita" data-author="Mikhail Bulgakov" data-image="book1.jpg"></i></h3>
            <p>Mikhail Bulgakov</p>
        </div>
        <div class="book-card">
            <img src="book2.jpg" alt="book cover">
            <h3>Naked Lunch <i class="fas fa-bookmark save-bookmark" data-title="Naked Lunch" data-author="William S. Burroughs" data-image="book2.jpg"></i></h3>
            <p>William S. Burroughs</p>
        </div>
        <div class="book-card">
            <img src="book3.jpg" alt="book cover">
            <h3>The Stranger <i class="fas fa-bookmark save-bookmark" data-title="The Stranger" data-author="Albert Camus" data-image="book3.jpg"></i></h3>
            <p>Albert Camus</p>
        </div>
        <div class="book-card">
            <img src="book4.jpg" alt="book cover">
            <h3>The Origins of Totalitarianism <i class="fas fa-bookmark save-bookmark" data-title="The Origins of Totalitarianism" data-author="Hannah Arendt" data-image="book4.jpg"></i></h3>
            <p>Hannah Arendt</p>
        </div>
        <div class="book-card">
            <img src="book5.jpg" alt="book cover">
            <h3>Food and Cooking <i class="fas fa-bookmark save-bookmark" data-title="Food and Cooking" data-author="Harold McGee" data-image="book5.jpg"></i></h3>
            <p>Harold McGee</p>
        </div>
        <div class="book-card">
            <img src="book6.jpg" alt="book cover">
            <h3>The Handmaid's Tale <i class="fas fa-bookmark save-bookmark" data-title="The Handmaid's Tale" data-author="Margaret Atwood" data-image="book6.jpg"></i></h3>
            <p>Margaret Atwood</p>
        </div>
        </section>

    
        </main>
    </div>      
</body>

</html>