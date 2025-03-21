<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/admin.css"> 
    <script src="index.js" defer></script>
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
        <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>
        
        <!-- Stock Table -->
        <section id="stock" class="mb-10">
            <h2 class="text-xl font-semibold mb-3">Stock Management</h2>
            <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">ID</th>
                            <th class="border p-2">Title</th>
                            <th class="border p-2">Author</th>
                            <th class="border p-2">Price</th>
                            <th class="border p-2">Stock</th>
                            <th class="border p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through books here -->
                        <tr>
                            <td class="border p-2">1</td>
                            <td class="border p-2">book book book</td>
                            <td class="border p-2">name name</td>
                            <td class="border p-2">twenny dollars</td>
                            <td class="border p-2">50</td>
                            <td class="border p-2 text-center">
                                <button class="bg-blue-500 text-white px-2 py-1 rounded">Edit</button>
                                <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
