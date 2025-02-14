<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/basket.css" onerror="alert('CSS file not found!')">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Basket</title>
</head>
<body>
    <h1>Done shopping?</h1> 
    <!-- Navigation Bar -->
    <div class="navBar">
        <a class="active" href="{{ route('index') }}">Home</a>
        <a href="{{ route('shop') }}">Books</a>
        <!--<a href="{{ route('saved') }}">Saved</a>-->
        <a href="{{ route('contact') }}">Contact Us</a>
    </div>
    <div class="main-container">
        <div class="basket-container">
            <h2>basket:</h2>

            @if (empty($basket))
                <p>The Basket is Currently Empty</p> 
            @else
                <!-- basket card (book cover, title, author, quantity with arrows, price) -->
                <!-- loops through basket array to display all items stored in session -->
                @foreach ($basket as $book)
                <div class="basket-card">
                    <!-- cover -->
                    <img src="{{ asset('images/'.$book['img_url']) }}" alt="Book Cover" class="book-cover">
                    <!-- title, author -->
                    <div class="book-info">
                        <p class="title">{{ $book['book_name'] }}</p>
                        <p class="author">{{ $book['first_name'] . " " . $book['last_name'] }}</p>
                    </div>
                    <div class="spacer"></div>
                    <!-- price -->
                    <p class="price">£{{ number_format($book['price'] * $book['quantity'],2)}}</p>
                    <!-- qty -->
                    <div class="quantity">
                        <!-- form for quantity decrease per book -->
                        <form action="{{route('basketUpdate') }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book['book_ID'] }}">
                            <input type="hidden" name="quantity" value="{{ $book['quantity'] - 1 }}">
                            <button class="arrow down">-</button>
                        </form>
                        <!-- quantity increase display -->
                        <input type="number" value="{{ $book['quantity'] }}" min="1" class="quantity-input" readonly="readonly">
                        <!-- form for quantity increase per book -->
                        <form action="{{route('basketUpdate') }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book['book_ID'] }}">
                            <input type="hidden" name="quantity" value="{{ $book['quantity'] + 1 }}">
                            <button class="arrow up">+</button>
                        </form>
                        <form action="{{route('basketRemove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book['book_ID'] }}">
                            <button class="add-to-basket-btn">Remove</button>
                        </form>
                    </div>
                </div>
                @endforeach
            @endif
        </div>

        <div class="checkout-container">
            <h2>checkout:</h2>
            <form action="{{ route('confirmBasket')}}" method="POST" class="main-checkout-form"> <!-- the whole checkout bit should be contained in this form now :) -->
                @csrf
                <div class="main-content">
                    <div class="delivery-address">
                        <h2>Delivery Address</h2>
                        <label for="first-name">First Name:</label>
                        <input type="text" id="first-name" name="first-name" required>
                        <label for="last-name">Last Name:</label>
                        <input type="text" id="last-name" name="last-name" required>
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" required>
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city">
                        <label for="postcode">Postcode:</label>
                        <input type="text" id="postcode" name="postcode">
                        <label for="country">Country:</label>
                        <input type="text" id="country" name="country">
                    </div>

                    <div class="bank-details">
                        <h2>Bank Details</h2>
                        <label for="card-number">Card Number:</label>
                        <input type="text" id="card-number" name="card-number" required>
                        <label for="expiry-date">Expiry Date (MM/YY):</label>
                        <input type="text" id="expiry-date" name="expiry-date" required>
                        <label for="cvv">CVV:</label>
                        <input type="text" id="cvv" name="cvv" required>
                    </div>
                </div>

                <div class="right-column">
                    <div class="delivery-options">
                        <h2>Delivery Options</h2>
                        <label>
                            <input type="radio" name="delivery" value="next-day"> 
                            Next Day (Orders before 6pm) - £5.99
                        </label>
                        <label>
                            <input type="radio" name="delivery" value="two-three-days"> 
                            2/3 Days - £2.99
                        </label>
                        <label>
                            <input type="radio" name="delivery" value="free-delivery" required> 
                            Free (5/7 Days)
                        </label>
                    </div>
                    <div class="your-order">
                        <h2>Your Order</h2>
                        <p>{{$totalItemsNo}} items</p>
                        <p>Subtotal (inc VAT): £0.00</p>
                        <hr>
                        <p class="total-to-pay">Total to Pay: £{{ number_format($total,2) }}</p>
                        <input type="hidden" name="total_price" value="{{ number_format($total,2)}}">
                        <button type="submit" class="checkout-button">Checkout</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
