<!DOCTYPE html>
<html lang="en">

<!-- stylesheet, javascript, bookmark icon -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <link rel="stylesheet" href="css/shop.css" onerror="alert('CSS file not found!')">
    <link rel="stylesheet" href="css/theme.css" onerror="alert('CSS file not found!')">
    <script src="shop_saved.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script type="text/javascript" src="darkmode.js" defer></script>
</head>

<body>

<!-- header, search bar -->
@include('header')

<!-- holds all content -->
<div class="store-container">
    
<!-- theme switch button -->
    <button id="theme-switch">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg>
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
        </button>


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

@include('footer')

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
    </footer>
</html>
 