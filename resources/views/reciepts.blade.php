<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script type="text/javascript" src="darkmode.js" defer></script>
    <link rel="stylesheet" href="css/profile.css" onerror="alert('CSS file not found!')">
    
    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.content-section').forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }
        
        document.addEventListener("DOMContentLoaded", function () {
            showSection('pastOrders'); // profile should show by default
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

        <!-- Content sections -->
        <div class="content-area">

    <div id="pastOrders" class="content-section" style="display:none;"> <!-- past orders section -->
        <h2>Past Orders</h2>
        @if ($orderitems->isEmpty())
            <p>You have no orders!</p>
        @else
           <table border="1">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date Delivered</th>
                    <th>Book Title</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Options</th>
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
                    <td>{{ $orderitem->item_status }}</td> <!-- status -->
                    <td>
                        <form action="{{route('returnItem')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $orderitem->book_id }}" name="bookID">
                            <input type="hidden" value="{{ $purchase_id }}" name="purchaseID">
                            @if ($orderitem->item_status != "Returned") 
                            <button type="submit" class="confirm-button">Return</button>
                            @else
                            <button type="button" class="confirm-button">None</button>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
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