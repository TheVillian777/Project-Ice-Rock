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

    <button id="theme-switch">
     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg>
     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
    </button>

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
        </div>

        <!-- Content sections -->
        <div class="content-area">
            <div id="profileInfo" class="content-section">
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

            <div id="pastOrders" class="content-section" style="display:none;">
                <h2>Past Orders</h2>
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
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="wishlist-section" class="content-section" style="display:none;">
            <h2><em>My Wish List</em> - 2 books</h2>
            <div class="wishlist-list">
                <div class="wish-item">
                    <div class="wish-cover">
                        <img src="images/book1.jpg" alt="PlaceHolder">
                    </div>
                    <div class="wish-details">
                        <h3>PlaceHolder</h3>  <!-- Placeholder for book title -->
                        <p class="author">PlaceHolder</p> <!-- Placeholder for author -->
                        <p class="price">&pound;9.99</p>
                        <a href="#" class="remove">Remove</a>
                    </div>
                </div>

                <div class="wish-item">
                    <div class="wish-cover">
                        <img src="images/book1.jpg" alt="PlaceHolder">
                    </div>
                    <div class="wish-details">
                        <h3>PlaceHolder</h3>
                        <p class="author">PlaceHolder</p>
                        <p class="price">&pound;9.99</p>
                        <a href="#" class="remove">Remove</a>
                    </div>
                </div>
            </div>

            <div id="paymentOptions" class="content-section" style="display:none;">
                <h2>Payment Options</h2>
                <p>Manage your saved payment options.</p>
            </div>
        </div>
    </div>

@include('footer')

</body>
</html>
