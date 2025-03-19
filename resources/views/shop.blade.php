<!DOCTYPE html>
<html lang="en">

<!-- stylesheet, javascript, bookmark icon -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <link rel="stylesheet" href="css/shop.css" onerror="alert('CSS file not found!')">
    <script src="shop_saved.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>

<!-- header, search bar -->
@include('header')

<!-- holds all content -->
<div class="store-container">

    <!-- side bar with filters -->
    <aside class="filters">
    <h2>Filters:</h2>
    <form action = "{{ route('shopFilter') }}" method="POST">
        @csrf
        <div class="filter-section">

            <!-- genre filters -->
             <h3>Genre</h3>
             <ul>
                @foreach ($categories as $category)
                <li><input type="checkbox" value="{{ $category->id }}" name="options[]"> <label for="{{ $category->name }}"> {{ $category->name }}</label></li>
                @endforeach
            </ul>
        </div>

        <!-- price filter (sliding range) -->
         <div class="filter">
            <label for="priceRange">Min Price:</label>
            <input type="range" id="priceRange" name="priceRange" min="0" max="25" value="{{ request()->input('priceRange', 0) }}">
            <span id="priceValue">£0</span>
        </div>

        <!-- filter by rating -->
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
        <div class="filter-section">
            <button type="submit" class="button">Submit</button>
        </div>
    </form>
    </aside>

        <!-- main content (book grid) -->
        <section class="book-grid">

        @include('book_card')

        </section>
        
    </div>
</body>
<footer>
        <div class="footer-container">
            <div class="footer-section">
                <p>&copy; 2025 Ice rock. All rights reserved.</p>
            </div>
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>Email: contact@icerock.com</p>
                <p>Phone: +1 234 567 890</p>
            </div>
            <div class="footer-section">
                <h3>Legal</h3>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
        </div>
        @endforeach
        </section>
        </main>
        
    </div>      
</body>
@include('footer')
</html>
