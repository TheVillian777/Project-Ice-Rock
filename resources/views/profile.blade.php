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
        
        // Function to show only Payment Options when clicked
function showSection(sectionId) {
    console.log("Switching to section:", sectionId);

    // Hide all content sections
    document.querySelectorAll('.content-section').forEach(section => {
        section.style.display = 'none';
    });

    // Show only the selected section
    let selectedSection = document.getElementById(sectionId);
    if (selectedSection) {
        selectedSection.style.display = 'block';
        console.log("Successfully displayed:", sectionId);
    } else {
        console.error("❌ Error: Section not found ->", sectionId);
    }
}

// Function to Show Update Payment Form
function showUpdatePaymentForm() {
    console.log("Opening Update Payment Form...");
    document.getElementById('savedPaymentDetails').style.display = 'none';
    document.getElementById('updatePaymentForm').style.display = 'block';
}

// Function to Save Payment Method and Update UI
function saveUpdatedPayment(event) {
    event.preventDefault(); // Prevents page reload

    let newCardType = document.getElementById('newCardType').value;
    let newCardNumber = document.getElementById('newCardNumber').value;
    let newExpiryDate = document.getElementById('newExpiryDate').value;
    let lastFourDigits = newCardNumber.slice(-4); // Get last 4 digits

    // Update displayed values
    document.getElementById('savedCardType').innerText = newCardType;
    document.getElementById('savedLastFourDigits').innerText = lastFourDigits;
    document.getElementById('savedExpiryDate').innerText = newExpiryDate;

    // Hide form, show saved details
    document.getElementById('updatePaymentForm').style.display = 'none';
    document.getElementById('savedPaymentDetails').style.display = 'block';

    alert("Payment details updated successfully!");
}


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
                <li><a href="#" onclick="showSection('yourAddress')">Your address</a></li>
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

            <div id="favourites" class="content-section" style="display:none;">
                <h2>Favourites</h2>
                <p>View and manage your favorite books here.</p>
            </div>

            <div id="paymentOptionsSection" class="content-section" style="display:none;">
                <h2>Payment Options</h2>
                <p>Manage your saved payment methods.</p>
                

             <!-- Payment Options Section -->
    <div id="savedPaymentDetails" class="saved-payment-details">
        <h3>Saved Payment Method</h3>
        <div class="card-details">
            <p><strong>Card Number:</strong> **** **** **** <span id="savedLastFourDigits">1234</span></p>
            <p><strong>Expiry Date:</strong> <span id="savedExpiryDate">06/24</span></p>
        </div>
        <button class="update-payment" onclick="showUpdatePaymentForm()">Update Payment Method</button>
    </div>

    
    <div id="updatePaymentForm" class="update-payment-form" style="display:none;">
        <h3>Update Payment Method</h3>
        <form onsubmit="saveUpdatedPayment(event)">
            

            <label for="newCardNumber">Card Number:</label>
            <input type="text" id="newCardNumber" name="newCardNumber" placeholder="Enter new card number" required>

            <label for="newExpiryDate">Expiry Date:</label>
            <input type="text" id="newExpiryDate" name="newExpiryDate" placeholder="MM/YY" required>

            <label for="newCvv">CVV:</label>
            <input type="text" id="newCvv" name="newCvv" placeholder="Enter CVV" required>

            <button type="submit">Save Payment Method</button>
        </form>
    </div>
</div>

    

            <div id="yourAddress" class="content-section" style="display:none;">
                <h2>Your Address</h2>
                <p>Manage your shipping and billing addresses.</p>
            </div>
        </div>
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
