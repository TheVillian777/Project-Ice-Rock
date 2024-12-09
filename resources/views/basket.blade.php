<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/basket.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Basket</title>
</head>
<body>
    <h1>Done Shopping?</h1> 
    <div class="main-container">
            <div class="basket-container">
                <h2>Basket:</h2>
                @if (empty($basket))
                <p>The Basket is Currently Empty</p> 
                    <!-- basket card (book cover, title, author, quantity with arrows, price) -->
                     <!-- loops through basket array to display all items stored in session -->
                    @foreach ($basket as $book)
                    <div class="basket-card">
                        <!-- cover -->
                        <img src="{{ asset($book['img_url']) }}" alt="Book Cover" class="book-cover">
                        <!-- title, author -->
                        <div class="book-info">
                            <p class="title">{{ $book['book_name'] }}</p>
                            <p class="author">{{ $book['first_name'] . " " . $book['last_name'] }}</p>
                        </div>
                        <div class="spacer"></div>
                        <!-- price -->
                        <p class="price">£({{ $book['price'] * $book['quantity']}})</p>
                        <!-- qty -->
                        <div class="quantity">
                            <!-- form for quantity decrease per book -->
                             <form action="{{route('basketUpdate') }}" method="POST">
                            @csrf
                                <input type = "hidden" name="book_id" value ="{{ $book['book_ID'] }}">
                                <input type = "hidden" name="quantity" value ="{{ $book['quantity'] - 1 }}">
                                <button class="arrow down">-</button>
                            </form>
                            <!-- quantity increase display -->
                            <input type="number" value= "{{$book['quantity']}}" min="1" class="quantity-input" readonly="readonly">
                            <!-- form for quantity increase per book -->
                            <form action="{{route('basketUpdate') }}" method="POST">
                            @csrf
                                <input type = "hidden" name="book_id" value ="{{ $book['book_ID'] }}">
                                <input type = "hidden" name="quantity" value ="{{ $book['quantity'] + 1 }}">
                                <button class="arrow up">+</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    

            </div>
            @endif
                <div class="checkout-container">
                     <h2>Checkout:</h2>
                     <div class="main-container">
                        <div class="main-content">
                        <div class="delivery-address">
                        <h2>Delivery Address</h2>
                        <form>
                            <label for="full-name">Full Name:</label>
                            <input type="text" id="full-name" name="full-name" required>
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" required>
                            <label for="city">City:</label>
                            <input type="text" id="city" name="city" required>
                            <label for="postcode">Postcode:</label>
                            <input type="text" id="postcode" name="postcode" required>
                            <label for="country">Country:</label>
                            <input type="text" id="country" name="country" required>
                        </form>
                        </div>

                        <div class="bank-details">
                        <h2>Bank Details</h2>
                        <form>
                            <label for="card-number">Card Number:</label>
                            <input type="text" id="card-number" name="card-number" required>
                            <label for="expiry-date">Expiry Date (MM/YY):</label>
                            <input type="text" id="expiry-date" name="expiry-date" required>
                            <label for="cvv">CVV:</label>
                            <input type="text" id="cvv" name="cvv" required>
                        </form>
                        </div>
                        </div>

                        <div class="right-column">
                        <div class="delivery-options">
                            <h2>Delivery Options</h2>
                            <form class="delivery-form">
                                <label>
                                    <input type="radio" name="delivery" value="next-day"> 
                                    Next Day (Orders before 6pm) - £5.99
                                </label>
                                <label>
                                    <input type="radio" name="delivery" value="two-three-days"> 
                                    2/3 Days - £2.99
                                </label>
                                <label>
                                    <input type="radio" name="delivery" value="free-delivery"> 
                                    Free (5/7 Days)
                                </label>
                            </form>
                        </div>

                        <div class="promotion-code">
                            <h2>Promotion Code (if available)</h2>
                            <form class="promo-form">
                                <input type="text" placeholder="Enter your code" class="promo-input">
                                <button type="button" class="promo-apply">Apply</button>
                            </form>
                        </div>

                        <div class="your-order">
                            <h2>Your Order</h2>
                            <p>0 items</p>
                            <p>Subtotal (inc VAT): £0.00</p>
                            <hr>
                            <p class="total-to-pay">Total to Pay: £0.00</p>
                            <p>Total VAT: £0.00</p>
                            <a href="checkout" class="checkout-button">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>