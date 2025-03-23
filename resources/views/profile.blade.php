<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css" onerror="alert('CSS file not found!')">
    <script type="text/javascript" src="darkmode.js" defer></script>


    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.content-section').forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }
        
        document.addEventListener("DOMContentLoaded", function () {
            showSection('profileInfo'); // profile should show by default
        });
    </script>

</head>

<body>

    <!-- header goes here -->
    @include('header')

<<<<<<< HEAD
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
>>>>>>> Stashed changes
=======
    <button id="theme-switch">
     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg>
     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
    </button>

>>>>>>> c8d3bb9e84e00f992c905c787a5a28c271222f31
    <!-- Wrap everything in the container -->
    <div class="container">
        <!-- Sidebar with links to different sections of the profile page -->
        <div class="sideBar">
            <h2>Account information</h2>
            <ul>
                <li><a href="#" onclick="showSection('profileInfo')">Your profile</a></li>
                <li><a href="#" onclick="showSection('pastOrders')">Past orders</a></li>
                <li><a href="#" onclick="showSection('wishlist-section')">Wishlist</a></li>
                <li><a href="#" onclick="showSection('paymentOptions')">Payment options</a></li>
            </ul>
<<<<<<< Updated upstream
=======
=======
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
>>>>>>> parent of 26bef1a (merge)
>>>>>>> Stashed changes
        </div>

<<<<<<< Updated upstream
=======
<<<<<<< HEAD
>>>>>>> Stashed changes
        <!-- Content sections -->
        <div class="content-area">
            <div id="profileInfo" class="content-section">
                <h2>Your profile</h2>
                <h3>Start your journey here! Share your information for faster checkouts and amend it anytime!</h3>
                <form action="{{ route('updateInfo') }}" method="post">
                @csrf
                    <label for="title">Title:</label>
                    <select id="title" name="title" value="{{ $showDetails->title }}">
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                        <option value="Ms">Ms</option>
                        <option value="Dr">Dr</option>
                        <option value="Prof">Prof</option>
                        <option value="Other">Other</option>
                    </select>
<<<<<<< Updated upstream
=======

                    <div class="name-input">
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" value="{{ $showDetails->first_name }}">
                    </div>

                    <div class="name-input">
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName" value="{{ $showDetails->last_name }}">
                    </div>

                    <div class="name-input">
                        <label for="phoneNumber">Phone Number:</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" value="{{ $showDetails->phone }}">
                    </div>

                    <div class="name-input">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" value="{{ $showDetails->address }}">
                    </div>
                    
                    <div class="name-input">
                        <label for="email">Current Email Address:</label>
                        <span>{{ $showDetails->email }}</span> <!-- changing email is not allowed -->
                    </div>

                    <button type="submit" class="confirm-button">Confirm</button>
                </form>
            </div>
            
    <div id="pastOrders" class="content-section" style="display:none;"> <!-- past orders section -->
        <h2>Past Orders</h2>
        @if ($orderitems->isEmpty())
            <p>You have no orders!</p>
        @else
        <table border="1">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date Ordered</th>
                    <th>Items</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->id }}</td> <!-- order ID -->
                    <td>{{ $purchase->created_at }}</td> <!-- date -->
                    @php $RepeatedItem = []; @endphp
                    <td>@foreach ($orderitems as $items)
                        @if ($items->purchase_id == $purchase->id)
                        @if (!in_array($items->book->book_name, $RepeatedItem))
                        <img src="{{ 'images/' . $items->book->img_url}} " alt="$items->book->book_name">
                        @endif
                        @php $RepeatedItem[] = $items->book->book_name; @endphp
                        <div></div>
                        @endif
                        @endforeach 
                    </td> <!-- book title -->
                        @php
                        $total = 0;
                        foreach ($orderitems as $items){
                        if ($items->purchase_id == $purchase->id){
                        $total = $total + $items->quantity;
                        }
                        }
                        @endphp
                    <td>
                        {{$total}}
                    </td> <!-- quantity -->
                    <td>£{{ $purchase->order_total_price }}</td> <!-- total price -->
                    <td>{{ $purchase->order_status }}</td> <!-- status -->
                    <td>
                        <form action=" {{ route('viewOrder') }}" method="post">
                        @csrf
                            <input type="hidden" value="{{ $orderitems }}" name="orderItems">
                            <input type="hidden" value="{{ $purchase->id }}" name="purchaseID">
                            <button type="submit" class="confirm-button">View</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
=======
<div class="search-box">
        <form action="{{ route('shopSearch') }}" method="POST">
            @csrf
            <div class="search-bar">
                <input type="text" name='search' placeholder="search for books..." id="search" value="{{ request()->input('search') }}">
                <button type="submit"><img src="magnifying-glass.png" alt="Search" class="search-icon"></button>
            </div>   
        </form>
        <!--<input type="text" placeholder="Search for books..." id="search-bar">
        <img src="magnifying-glass.png" alt="Search" class="search-icon">-->
>>>>>>> Stashed changes

                    <div class="name-input">
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" value="{{ $showDetails->first_name }}">
                    </div>

<<<<<<< Updated upstream
                    <div class="name-input">
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName" value="{{ $showDetails->last_name }}">
                    </div>

                    <div class="name-input">
                        <label for="phoneNumber">Phone Number:</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" value="{{ $showDetails->phone }}">
                    </div>

                    <div class="name-input">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" value="{{ $showDetails->address }}">
                    </div>
                    
                    <div class="name-input">
                        <label for="email">Current Email Address:</label>
                        <span>{{ $showDetails->email }}</span> <!-- changing email is not allowed -->
                    </div>

                    <button type="submit" class="confirm-button">Confirm</button>
                </form>
            </div>

    <div id="pastOrders" class="content-section" style="display:none;"> <!-- past orders section -->
        <h2>Past Orders</h2>

        @if ($orderitems->isEmpty())
            <p>You have no orders!</p>
        @else
        <table border="1">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Book Title</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderitems as $orderitem)
                <tr>
                    <td>{{ $orderitem->purchase->id }}</td> <!-- order ID -->
                    <td>{{ $orderitem->created_at }}</td> <!-- date -->
                    <td>{{ $orderitem->book->book_name }}</td> <!-- book title -->
                    <td>{{ $orderitem->quantity }}</td> <!-- quantity -->
                    <td>£{{ $orderitem->subtotal_price }}</td> <!-- total price -->
                    <td>{{ $orderitem->purchase->order_status }}</td> <!-- status -->
                </tr>
                @endforeach
            </tbody>
        </table>
=======
    <!-- Navigation Bar -->
    <div class="navBar">
        <a class="active" href="{{ route('index') }}">Home</a>
        <a href="{{ route('shop') }}">Books</a>
        <!--<a href="{{ route('saved') }}">Saved</a>-->
        <a href="{{ route('basket') }}">Basket</a>
        <a href="{{ route('aboutUs') }}">About Us</a>
        <a href="{{ route('contact') }}">Contact Us</a>
        <a href="{{ route('profile') }}">Profile</a>
        @if (Auth::check())
        <form action="{{ route('logout')}}" method="POST">
            @csrf
        <button type="submit">Log Out</button>
        </form>
        @else 
        <a href="{{ route('login') }}">Login</a>
        </form>
>>>>>>> parent of 26bef1a (merge)
>>>>>>> Stashed changes
        @endif
    </div>

    <div id="wishlist-section" class="content-section" style="display:none;">
            <h2><em>My Wish List</em> - {{count($wishlist)}} books</h2>
            <div class="wishlist-list">
                @if (!$wishlist)
                <p> There is no wishlist </p>
                @else
                @foreach ($wishlist as $book)
                <div class="wish-item">
                        <div class="wish-cover">
                            <img src="{{ asset('images/' . $book['img_url']) }}" alt="Book Cover">
                        </div>
                        <div class="wish-details">
                            <h3>{{$book['book_name']}}</h3>
                            <p class="author">{{$book['first_name'] . " ". $book['last_name']}}</p>
                            <p class="price">&pound;{{$book['book_price']}}</p>
                            <a href="{{ route('listing', ['book_id' => $book['book_ID']]) }}" class="remove">View</a>
                            <a href="{{ route('unwishing', ['book_id' => $book['book_ID']]) }}" class="remove">Remove</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>

        <div id="paymentOptions" class="content-section" style="display:none;">
            <h2>Saved Payment Method</h2>

<<<<<<< HEAD
    <div id="yourAddress" class="content-section" style="display:none;"> <!-- address section -->
        <h2>Your Address</h2>
        <p>Manage your shipping and billing addresses.</p>
    </div>
</body>

@include('footer')
<<<<<<< Updated upstream
</html>
=======
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> parent of 26bef1a (merge)
>>>>>>> Stashed changes
=======
            @if($showPaymentDetails)
                <div class="card-details">
                    <p>Card Number: ****{{ substr($showPaymentDetails->card_number, -4) }}</p>
                    <p>Expiry Date: {{ $showPaymentDetails->expiry_date }}</p>
                </div>
            @else
                <p>No saved payment Details</p>
            @endif
            
            <button type="submit" class="confirm-button" onclick="showUpdatePaymentDetailsForm()">Update Card Details?</button>
        </div>

        <div id="updatePaymentDetails" class="content-section" style="display:none;">
            <h2>Update Payment Method</h2>
            <form action="{{route ('updatePaymentDetails') }}" method="post">
            @csrf
            <div class="new-card-details">
                <label for="cardNumber">Card Number:</label>
                <input type="text" id="cardNumber" name="cardNumber" placeholder="Enter new card number" required>

                <label for="expiryDate">Expiry Date:</label>
                <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>

                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" required>
            </div>

            <button type="submit" class="confirm-button" onclick="showPaymentDetailsForm()">Save Payment Method</button>
            </form>
        </div>
</div>



<script>
    function showUpdatePaymentDetailsForm(){
        document.getElementById('updatePaymentDetails').style.display = 'block';
        document.getElementById('paymentOptions').style.display = 'none';
    }

    function showPaymentDetailsForm(){
        document.getElementById('updatePaymentDetails').style.display = 'none';
        document.getElementById('paymentOptions').style.display = 'block';
    }
</script>



</body>

@include('footer')

</html>
>>>>>>> c8d3bb9e84e00f992c905c787a5a28c271222f31
