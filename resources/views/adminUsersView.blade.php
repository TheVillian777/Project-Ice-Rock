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
                <li><a href="#" onclick="showSection('profileInfo')">User profile</a></li>
                <li><a href="#" onclick="showSection('pastOrders')">Past orders</a></li>
            </ul>
        </div>

        <!-- Content sections -->
        <div class="content-area">
            <div id="profileInfo" class="content-section">

                <form action="{{ route('adminInfoChange',  ['user_id' => $showDetails->id]) }}" method="post">
                @csrf

                    <!-- input for title -->
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

                    <!-- input field for first name -->
                    <div class="name-input">
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" value="{{ $showDetails->first_name }}">
                    </div>

                    <!-- input field for last name -->
                    <div class="name-input">
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName" value="{{ $showDetails->last_name }}">
                    </div>

                    <!-- input field for phone number -->
                    <div class="name-input">
                        <label for="phoneNumber">Phone Number:</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" value="{{ $showDetails->phone }}">
                    </div>

                    <!-- input field for address -->
                    <div class="name-input">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" value="{{ $showDetails->address }}">
                    </div>
                    
                    <!-- input field for Email -->  
                    <div class="name-input">
                        <label for="email">Email Address:</label>
                        <input type="text" id="email" name="email" value="{{ $showDetails->email }}">
                    </div>  

                    <!-- input field for security question answer -->
                    <div class="name-input">
                        <label for="security_answer">Enter your security answer:</label>
                        <input type="text" id="security_answer" name="security_answer" value= "{{ $showDetails->security_answer }}" placeholder="What's the name of your first pet?">
                    </div>

                    <!-- input field for password -->  
                    <div class="name-input">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password">
                    </div>

                    <!-- input field for confirm password-->    
                    <div class="name-input">
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" id="confirm_password" name="confirm-password" >
                    </div>

                     <!-- Drop-down menu for security level-->
                     <div class="name-input">
                        <label for="security-level">User Security Level</label>
                        <select id="security-level" name="security_level" value="{{ $showDetails->security_level }}">
                            <option value="{{ $showDetails->security_level }}"></option>
                            <option value="Customer">Customer</option>
                            <option value="Admin">Admin</option>
                            <option value="Senior-Admin">Senior-Admin</option>
                        </select>
                    </div>

                    <!-- submit button -->
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

</body>
