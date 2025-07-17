<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/theme.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.form-container').forEach(section => {
                section.style.display = 'none';
            });


            const sectionToShow = document.getElementById(sectionId);
            if (sectionToShow) {
                sectionToShow.style.display = 'block';
            }

            

            document.getElementById('user-grid').style.display = 'none';
        }
        
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("user-grid").style.display = 'flex';
            document.querySelectorAll('.form-container').forEach(section => {
                section.style.display = 'none';
            });
        });
    </script>
</head>
<body>

<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md p-5">
        <h2 class="text-xl font-semibold mb-4">Admin Panel</h2>
        <ul>
            <li class="mb-2"><a href="{{ route('admin') }}" class="text-gray-700 hover:text-blue-600">Dashboard</a></li>
            @if (Auth::check() && $admin == 'Senior-Admin')
            <li class="mb-2"><a href="{{ route('adminUsers') }}" class="text-gray-700 hover:text-blue-600">Users</a></li>
            @endif
            <li class="mb-2"><a href="{{ route('adminStock') }}" class="text-gray-700 hover:text-blue-600">Stock</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-6">User Management</h1>
        <!-- User Search Bar -->
        <div class="search-box">
            <form action="{{ route('searchUser') }}" method="GET">
                @csrf
                <div class="search-bar">
                    <input type="text" name='search' placeholder="Search for users..." id="search" value="{{ request()->input('search') }}">
                    <button type="submit" class="search-icon">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <section class="user-grid" id="user-grid">
            <!-- defining a user card -->
            @foreach ($users as $user)
            <div class="user-card" id="user-card" onclick="window.location='{{ route('adminUserView', ['user_id' => $user->id]) }}'">
                <div class="user-info">
                        <h4 class="userName">{{ $user->first_name }} {{ $user->last_name }} </h4>
                        <h5 class="securityLevel">{{ $user->security_level}}</h5>
                        <p class="userEmail">{{ $user->email}}</p>
                </div>
            </div>
            @endforeach


            <div class="user-card" href="#" onclick="showSection('register-form')">
                <div class="user-info">
                        <h4 class="Create New Users">Create New Users</h4>
                        <h4 class="Create New Users">+</h4>
                </div>
            </div>
        </section>

        <!-- register Section -->
    <div class="form-container" id="register-form" style="display: none;">
        <h2>Register</h2>
        <form action="{{ route('register') }}" method="post">
            @csrf

        <!-- input title -->
            <label for="register-title">Title:</label>
            <select id="register-title" name="title" required>
                <option value="Mr">Mr</option>
                <option value="Mrs">Mrs</option>
                <option value="Miss">Miss</option>
                <option value="Ms">Ms</option>
                <option value="Dr">Dr</option>
                <option value="Prof">Prof</option>
                <option value="Other">Other</option>
            </select>

        <!-- input first name -->
            <label for="register-first">First Name:</label>
            <input type="text" id="register-first" name="first_name" required>
            
        <!-- input last name -->
            <label for="register-last">Last Name:</label>
            <input type="text" id="register-last" name="last_name" required> 

        <!-- input phone number -->
            <label for="register-phone">phone number:</label>
            <input type="tel" id="register-phone" name="phone" pattern="[0-9]{11}"> 

            <br></br>

        <!-- input email -->
            <label for="register-email">Email:</label>
            <input type="email" id="register-email" name="email" required>

        <!-- input address -->
            <label for="register-address">Address:</label>
            <input type="address" id="register-address" name="address" required>

        <!-- input password -->    
            <label for="register-password">Password:</label>
            <input type="password" id="register-password" name="password" required>

        <!-- confirm password -->    
            <label for="register-confirm-password">Confirm Password:</label>
            <input type="password" id="register-confirm-password" name="confirm-password" required>

        <!-- security question -->
            <label for="register-security-answer">Enter your security answer:</label>
            <input type="text" id="register-security-answer" name="security_answer" placeholder="What's the name of your first pet?" required>

        <!-- submit -->
            <button type="submit">Register</button>
        </form>
    </div>

        


    </div>
</div>




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
