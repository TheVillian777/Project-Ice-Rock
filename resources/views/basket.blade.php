<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/basket.css" onerror="alert('CSS file not found!')">
    <script type="text/javascript" src="darkmode.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Basket</title>
</head>
<body>

@include('header')

    <button id="theme-switch">
     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg>
     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
    </button>

    <div class="main-container">
        <div class="basket-container">
            <h2>Basket:</h2>

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
                    <p class="price">£{{ number_format($book['book_price'] * $book['quantity'],2)}}</p>
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
                            <button class="arrow up">x</button>
                        </form>
                    </div>
                </div>
                @endforeach
            @endif
        </div>

        <div class="checkout-container">
            <h2>Checkout:</h2>
            <form id="checkout-form" onsubmit="return validateForm(event)" action="{{ route('confirmBasket')}}" method="POST" class="main-checkout-form"> <!-- the whole checkout bit should be contained in this form now :) -->
                @csrf
                <div class="main-content">
                    <div class="delivery-address">
                        <h2>Delivery Address</h2>
                        <label for="first-name">First Name:</label>
                        <input type="text" id="first-name" name="first-name" value="{{ $user->first_name }}" required>
                        <label for="last-name">Last Name:</label>
                        <input type="text" id="last-name" name="last-name" value="{{ $user->last_name }}" required>
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" value="{{ $user->address }}" required>
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" required>
                        <label for="postcode">Postcode:</label>
                        <input type="text" id="postcode" name="postcode" required>
                        <label for="country">Country:</label>
                        <input type="text" id="country" name="country" required>
                    </div>

                    <!--checks if there is a payment. if no payment display nothing-->
                    <div class="bank-details">
                        <h2>Bank Details</h2>
                        <label for="card-number">Card Number:</label>
                        <input type="text" id="card-number" name="card-number" value="{{ $payment ? $payment->card_number: '' }}" required>
                        <label for="expiry-date">Expiry Date (MM/YY):</label>
                        <input type="text" id="expiry-date" name="expiry-date" value="{{ $payment ? $payment->expiry_date: '' }}" required>
                        <label for="cvv">CVV:</label>
                        <input type="text" id="cvv" name="cvv" value="{{ $payment? $payment->security_code: '' }}" required>
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

@include('footer')

<script>
    function validateForm() //https://stackoverflow.com/questions/27054951/how-do-i-validate-a-credit-card-expiry-date-with-javascript
    {
        var cardNumber = document.getElementById('card-number');
        var expiryDate = document.getElementById('expiry-date');
        var cvv = document.getElementById('cvv');

        if(cardNumber.value.length!=16 || isNaN(cardNumber.value)){  //has to be 16 digits and numbers
            alert("Please enter 16 numbers for your credit card");
            cardNumber.focus();
            return false;
        }

        if(expiryDate.value.length !=5 || !expiryDate.value.includes('/')){ //must be 5 chars including /
            alert("Please enter in format MM/YY")
            expiryDate.focus();
            return false;
        }

        if(cvv.value.length!=3 || isNaN(cvv.value)){ //has to be 3 digits and numbers
            alert("Please enter 3 numbers for your security code")
            cvv.focus();
            return false;
        }
        return true;
            
    }
</script>


</body>
</html>
