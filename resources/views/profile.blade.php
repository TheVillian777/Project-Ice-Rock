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

    <div class="navBar">
        <a class="active" href="{{ route('index') }}">Home</a>
        <a href="{{ route('shop') }}">Books</a>
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
        @endif
    </div>

    <div class="sideBar"> <!-- side bar with links to different sections of the profile page -->
        <h2>Account information</h2>
        <ul>
            <li><a href="#" onclick="showSection('profileInfo')">Your profile</a></li>
            <li><a href="#" onclick="showSection('pastOrders')">Past orders</a></li>
            <li><a href="#" onclick="showSection('favourites')">Favourites</a></li>
            <li><a href="#" onclick="showSection('paymentOptions')">Payment options</a></li>
            <li><a href="#" onclick="showSection('yourAddress')">Your address</a></li>
        </ul>
    </div>

    <div id="profileInfo" class="content-section"> <!-- profile information section -->
        <h2>Your profile</h2>
        <h3>Start your journey here! Share your information for faster checkouts and amend it anytime!</h3>
        <form action="#" method="POST">
            <label for="title">Title:</label>
            <select id="title" name="title">
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
                <input type="text" id="firstName" name="firstName" placeholder="Enter your first name">
            </div>

            <div class="name-input">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" placeholder="Enter your last name">
            </div>

            <div class="name-input">
                <label for="phoneNumber">Phone Number:</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number">
            </div>

            <div class="name-input">
                <label for="email">Current Email Address:</label>
                <input type="text" id="email" name="email" placeholder="PageTurner@gmail.com">
            </div>

            <div class="changePassword">
                <p>Would you like to change your password?</p>
            </div>

            <div class="name-input">
                <label for="currentPassword">Current Password:</label>
                <input type="password" id="currentPassword" name="currentPassword" placeholder="Enter your current password">
            </div>

            <div class="name-input">
                <label for="newPassword">New Password:</label>
                <input type="password" id="newPassword" name="newPassword" placeholder="Enter your new password">
            </div>

            <div class="name-input">
                <label for="confirmPassword">Confirm New Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Re-enter your new password">
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
