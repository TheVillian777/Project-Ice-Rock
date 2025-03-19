<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css" onerror="alert('CSS file not found!')">
    
    <script>
        <script>
        // Function to display the selected section
        function displaySection(sectionId) {
            console.log("Displaying section:", sectionId);
            
            // Hide all sections first
            document.querySelectorAll('.content-section').forEach(section => {
                section.style.display = 'none';
            });
            
            // Show the chosen section
            let sectionToShow = document.getElementById(sectionId);
            if (sectionToShow) {
                sectionToShow.style.display = 'block';
            } else {
                console.error("Error: Could not locate section:", sectionId);
            }
        }
        
        // Display form for updating payment details
        function togglePaymentUpdate() {
            console.log("Switching to update payment form...");
            document.getElementById('savedPaymentDetails').style.display = 'none';
            document.getElementById('paymentUpdateForm').style.display = 'block';
        }
        
        // Save new payment details
        function savePaymentDetails(event) {
            event.preventDefault();
            
            let cardNumber = document.getElementById('cardNumber').value;
            let expiryDate = document.getElementById('expiryDate').value;
            let lastFourDigits = cardNumber.slice(-4);
            
            // Update UI with new card details
            document.getElementById('displayLastFour').innerText = lastFourDigits;
            document.getElementById('displayExpiry').innerText = expiryDate;
            
            
            document.getElementById('paymentUpdateForm').style.display = 'none';
            document.getElementById('savedPaymentDetails').style.display = 'block';
            
            alert("Payment method successfully updated!");
        }
    </script>
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

    <section id="paymentMethods" class="content-section" style="display:none;">
                <h2>Payment Methods</h2>
                <div id="savedPaymentDetails">
                    <p><strong>Card:</strong> **** **** **** <span id="displayLastFour">1234</span></p>
                    <p><strong>Expires:</strong> <span id="displayExpiry">06/24</span></p>
                    <button onclick="togglePaymentUpdate()">Update Payment</button>
                </div>
                
                <div id="paymentUpdateForm" style="display:none;">
                    <h3>Update Payment Information</h3>
                    <form onsubmit="savePaymentDetails(event)">
                        <label for="cardNumber">Card Number:</label>
                        <input type="text" id="cardNumber" placeholder="Enter new card number" required>
                        
                        <label for="expiryDate">Expiry Date:</label>
                        <input type="text" id="expiryDate" placeholder="MM/YY" required>
                        
                        <button type="submit">Save</button>
                    </form>
                </div>
            </section>

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
