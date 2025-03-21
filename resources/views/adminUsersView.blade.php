<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="/css/profile.css">
    
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
 <!-- Wrap everything in the container -->
 <div class="container">
        <!-- Sidebar with links to different sections of the profile page -->
        <div class="sideBar">
            <h2>Account information</h2>
            <ul>
                <li><a href="#" onclick="showSection('profileInfo')">Your profile</a></li>
                <li><a href="#" onclick="showSection('pastOrders')">Past orders</a></li>
                <li><a href="#" onclick="showSection('paymentOptions')">Payment options</a></li>
            </ul>
        </div>

        <!-- Content sections -->
        <div class="content-area">
            <div id="profileInfo" class="content-section">
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
                        <label for="email">Email Address:</label>
                        <input type="text" id="email" name="email" value="{{ $showDetails->email }}">
                    </div>

                    <button type="submit" class="confirm-button">Confirm</button>
                </form>
            </div>


</body>
