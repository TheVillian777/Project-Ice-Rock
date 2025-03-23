<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/admin.css" onerror="alert('CSS file not found!')"> 
    <script src="index.js" defer></script>
    <script type="text/javascript" src="darkmode.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

@include('header')

<!-- dark mode -->
<button id="theme-switch">
<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg>
<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
</button>

<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md p-5">
        <h2 class="text-xl font-semibold mb-4">Admin Panel</h2>
        <ul>
            <li class="mb-2"><a href="#" class="text-gray-700 hover:text-blue-600">Dashboard</a></li>
            <li class="mb-2"><a href="#stock" class="text-gray-700 hover:text-blue-600">Stock</a></li>
            <li class="mb-2"><a href="#customers" class="text-gray-700 hover:text-blue-600">Customers</a></li>
            <li class="mb-2"><a href="#orders" class="text-gray-700 hover:text-blue-600">Orders</a></li>
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
        
        <!-- Customers Table -->
        <section id="customers" class="mb-10">
            <h2 class="text-xl font-semibold mb-3">Customer List</h2>
            <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">ID</th>
                            <th class="border p-2">Name</th>
                            <th class="border p-2">Email</th>
                            <th class="border p-2">Joined Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through customers here -->
                        <tr>
                            <td class="border p-2">1</td>
                            <td class="border p-2">name name</td>
                            <td class="border p-2">name@name.com</td>
                            <td class="border p-2">2025-01-01</td>
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
