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
</head>
<body>

<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md p-5">
        <h2 class="text-xl font-semibold mb-4">Admin Panel</h2>
        <ul>
            <li class="mb-2"><a href="{{ route('admin') }}" class="text-gray-700 hover:text-blue-600">Dashboard</a></li>
            <li class="mb-2"><a href="{{ route('adminUsers') }}" class="text-gray-700 hover:text-blue-600">Users</a></li>
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
        <section class="user-grid">
            <!-- defining a user card -->
            @foreach ($users as $user)
            <div class="user-card" onclick="window.location='{{ route('adminUserView', ['user_id' => $user->id]) }}'">
                <div class="user-info">
                        <h4 class="userName">{{ $user->first_name }} {{ $user->last_name }} </h4>
                        <p class="userEmail">{{ $user->email}}</p>
                </div>
            </div>
            @endforeach
        </section>


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
