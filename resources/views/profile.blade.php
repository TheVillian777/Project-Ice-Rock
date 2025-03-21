<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css" onerror="alert('CSS file not found!')">
    
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

    <!-- Wrap everything in the container -->
    <div class="container">
        <!-- Sidebar with links to different sections of the profile page -->
        <div class="sideBar">
            <h2>Account information</h2>
            <ul>
                <li><a href="#" onclick="showSection('profileInfo')">Your profile</a></li>
                <li><a href="#" onclick="showSection('pastOrders')">Past orders</a></li>
                <li><a href="#" onclick="showSection('favourites')">Favourites</a></li>
                <li><a href="#" onclick="showSection('paymentOptions')">Payment options</a></li>
            </ul>
        </div>

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
        @endif
    </div>

    <div id="favourites" class="content-section" style="display:none;"> <!-- favourites section -->
        <h2>Favourites</h2>
        <p>View and manage your favorite books here.</p>
    </div>

    <div id="paymentOptions" class="content-section" style="display:none;"> <!-- payment options section -->
        <h2>Payment Options</h2>
        <p>Manage your saved payment methods.</p>
    </div>

    <div id="yourAddress" class="content-section" style="display:none;"> <!-- address section -->
        <h2>Your Address</h2>
        <p>Manage your shipping and billing addresses.</p>
    </div>
</body>
<!--
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
</html>
    -->