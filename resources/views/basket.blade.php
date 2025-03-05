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
                    <img src="{{ asset($book['img_url']) }}" alt="Book Cover" class="book-cover">
                    <!-- title, author -->
                    <div class="book-info">
                        <p class="title">{{ $book['book_name'] }}</p>
                        <p class="author">{{ $book['first_name'] . " " . $book['last_name'] }}</p>
                    </div>
                    @endforeach
                @endif
            </div>
            
            <!-- Checkout Section -->
            <div class="bg-white p-6 shadow-md rounded-lg">
                <h2 class="text-2xl font-semibold mb-4">Checkout:</h2>
                <form action="{{ route('confirmBasket')}}" method="POST" class="space-y-4">
                    @csrf
                    
                    <div>
                        <h3 class="font-semibold">Delivery Address</h3>
                        <input type="text" name="first-name" placeholder="First Name" class="w-full border p-2 rounded-lg" required>
                        <input type="text" name="last-name" placeholder="Last Name" class="w-full border p-2 rounded-lg mt-2" required>
                        <input type="text" name="address" placeholder="Address" class="w-full border p-2 rounded-lg mt-2" required>
                        <input type="text" name="city" placeholder="City" class="w-full border p-2 rounded-lg mt-2">
                        <input type="text" name="postcode" placeholder="Postcode" class="w-full border p-2 rounded-lg mt-2">
                        <input type="text" name="country" placeholder="Country" class="w-full border p-2 rounded-lg mt-2">
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
                    
                    <div>
                        <h3 class="font-semibold">Delivery Options</h3>
                        <label class="block">
                            <input type="radio" name="delivery" value="next-day"> Next Day - £5.99
                        </label>
                        <label class="block">
                            <input type="radio" name="delivery" value="two-three-days"> 2/3 Days - £2.99
                        </label>
                        <label class="block">
                            <input type="radio" name="delivery" value="free-delivery" required> Free (5/7 Days)
                        </label>
                    </div>
                    
                    <div>
                        <h3 class="font-semibold">Your Order</h3>
                        <p>{{$totalItemsNo}} items</p>
                        <p class="font-bold">Total to Pay: £{{ number_format($total,2) }}</p>
                        <input type="hidden" name="total_price" value="{{ number_format($total,2)}}">
                        <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded-lg mt-4">Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
