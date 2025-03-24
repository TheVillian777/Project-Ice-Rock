<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/index.css" onerror="alert('CSS file not found!')">
    <script type="text/javascript" src="darkmode.js" defer></script>
    <script type="text/javascript" src="index.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    @include('header')


    <button id="theme-switch">
     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg>
     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
    </button>


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

    <!-- Book showcase -->
    <div class="book-slider">

        <!-- Top right "See More" link-->
        <div class="showcase-header">
            <h2 class="showcase-title">Our Showcase</h2>
            <a href="{{ route('shop') }}" class="see-more">See More</a>
        </div>

        <button class="book-prev-arrow">&#10094;</button>
        <div class="book-slider-container">
            <div class="container-slide">
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
            <div class="container-slide">
                @include('book_card')
            </div>
            @endforeach
        </div>
        <button class="book-next-arrow">&#10095;</button>
    </div>

    @if ($viewed)
    <!-- Recently viewed showcase -->
    <div class="book-slider">

        <!-- Top right "See More" link-->
        <div class="showcase-header">
            <h2 class="showcase-title">Recently Viewed</h2>
            <a href="{{ route('shop') }}" class="see-more">See More</a>
        </div>

        <button class="book-prev-arrow">&#10094;</button>
        <div class="book-slider-container">
            <div class="container-slide">
                @include('viewed_card')
            </div>
        </div>
        <button class="book-next-arrow">&#10095;</button>
    </div>
    @endif

    @include('footer')

</body>
</html>



