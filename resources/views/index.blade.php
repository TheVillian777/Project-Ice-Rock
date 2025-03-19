<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/index.css" onerror="alert('CSS file not found!')">
    <script src="index.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    @include('header')

    <!-- Image placeholder -->
    <div class="image-slider">
    <div class="slider-container">
        <div class="slide">
            <img src="images/image-slide1.png" alt="Slide 1">
        </div>
        <div class="slide">
            <img src="images/image-slide2.png" alt="Slide 2">
        </div>
        <div class="slide">
            <img src="images/image-slide3.png" alt="Slide 3">
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
            <a href="{{ route('shop') }}" class="see-more">See More</a>
        </div>

        <button class="book-prev-arrow">&#10094;</button>
        <div class="book-slider-container">
            @foreach ($books as $book)
            <div class="book-slider-container">
                @include('book_card')
            </div>
            @endforeach
        </div>
        <button class="book-next-arrow">&#10095;</button>
    </div>


    <!-- Divider Line -->
    <div class="section-divider"></div>

    <!-- Genre Icons Section -->
    <div class="genre-icons">
        @foreach ($categories->unique('name') as $category)
        <form action="{{ route('navigateShop') }}" method="POST">
            @csrf
            <div class="genre-icon">
                <input type="hidden" value="{{ $category->id }}" name="genre-select">
                <button type="submit">
                    <!-- Ensure correct genre images are displayed -->
                    <img src="images/{{ strtolower(str_replace(' ', '-', $category->name)) }}.png" alt="{{ $category->name }}">
                    <p>{{$category->name}}</p>
                </button>
            </div>
        </form>
        @endforeach
    </div>

    <!-- Divider Line -->
    <div class="section-divider"></div>

    <!-- Banner Section -->
    <div class="banner-section">
        <img src="images/banner.png" alt="Promotional Banner">
    </div>

    <!-- Divider Line -->
    <div class="section-divider"></div>

    <!-- Book showcase -->
    <div class="book-slider">

        <!-- Top right "See More" link-->
        <div class="showcase-header">
            <h2 class="showcase-title">Our Showcase</h2>
            <a href="{{ route('shop') }}" class="see-more">See More</a>
        </div>

        <button class="book-prev-arrow">&#10094;</button>
        <div class="book-slider-container">
            @foreach ($books as $book)
            <div class="book-slider-container">
                @include('book_card')
            </div>
            @endforeach
        </div>
        <button class="book-next-arrow">&#10095;</button>
    </div>


</body>
</html>



