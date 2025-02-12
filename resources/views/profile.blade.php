<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <h2 class="text-2xl font-semibold mb-4">Your Profile</h2>

    <!-- Username Section -->
    <div class="mb-6">
        <label class="block text-gray-700 font-semibold mb-2">Username</label>
        <div class="flex gap-2">
            <input type="text" value="name logged in" class="w-full border px-3 py-2 rounded-lg">
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg">Edit</button>
        </div>
    </div>

    <!-- Change Password -->
    <div class="mb-6">
        <label class="block text-gray-700 font-semibold mb-2">Change Password</label>
        <input type="password" placeholder="New Password" class="w-full border px-3 py-2 rounded-lg mb-2">
        <button class="bg-green-600 text-white px-4 py-2 rounded-lg">Update Password</button>
    </div>

    <!-- Shipping Address -->
    <div class="mb-6">
        <label class="block text-gray-700 font-semibold mb-2">Shipping Address</label>
        <textarea class="w-full border px-3 py-2 rounded-lg" rows="3">123 street address</textarea>
        <button class="bg-yellow-600 text-white px-4 py-2 mt-2 rounded-lg">Update Address</button>
    </div>

    <!-- Past Book Purchases -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-2">Past Purchases</h3>
        <ul class="space-y-2">
            <li class="border p-3 rounded-lg bg-gray-100">📖 <strong>book</strong> - date</li>
            <li class="border p-3 rounded-lg bg-gray-100">📖 <strong>book</strong> - date</li>
        </ul>
    </div>

    <!-- Past Reviews -->
    <div>
        <h3 class="text-xl font-semibold mb-2">Your Reviews</h3>
        <ul class="space-y-2">
            <li class="border p-3 rounded-lg bg-gray-100">
                <strong>book</strong>
                <p class="text-gray-700">"review"</p>
                <span class="text-sm text-gray-500">date posted</span>
            </li>
            <li class="border p-3 rounded-lg bg-gray-100">
                <strong>another book</strong>
                <p class="text-gray-700">"another review"</p>
                <span class="text-sm text-gray-500">another date posted</span>
            </li>
        </ul>
    </div>
</div>

</body>
</html>
