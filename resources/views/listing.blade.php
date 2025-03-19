<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/listing.css">
    <script src="listing.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" onerror="alert('CSS file not found!')">
    <title>Product Listing</title>
</head>
<body>

@include('header')

    <div class="main-container">
        <div class="cover-container">
            <div class="book-cover">
                <img src="{{ asset($book->img_url)}}" alt="Book Cover">
            </div>

            <div class="genre-text">
                {{ $book->category->name}}
            </div>
        </div>

        <div class="info-container">
            <div class="book-title">
                <h2>{{ $book->book_name }}</h2>
            </div>

            <div class="author">
                <p>{{ $book->author->first_name . " " . $book->author->last_name}}</p>
            </div>

            <div class="publish-date">
                <p>PUBLISH-DATE</p>
            </div>

            <div class="book-description">
                <p> {{ $book->book_description}} </p>
            </div>

        </div>

        <div class="basket-container">
        <div class="price">
                <p>£{{$book->book_price}}</p>
            </div>
                <form action="{{route('addToBasket') }}" method="POST">
                    @csrf
                    <div class="quantity">
                        <input type="hidden" value="{{ $book->id }}" name="bookId">
                        <input type="number" id="quantityOf_{{ $book->id }}" name="quantity" min="1" value="1" placeholder="1">
                    </div>
                    <br>
                    <div class="add-to-basket">
                        <button class="add-to-cart-btn"><i class="fa-sharp fa-solid fa-basket-shopping" data-id="{{ $book->id }}"></i> Add to basket</button>
                     </div>
                </form>
                <div class="add-to-basket">
                        <button class="add-to-cart-btn" onclick="window.location.href='{{ route('shop') }}'"><i onclick="{{ route('shop')}}"></i> Back to shop </button>
                    </div>
            </div>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <p>&copy; 2025 Ice Rock. All rights reserved.</p>
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
</body>
</html>
