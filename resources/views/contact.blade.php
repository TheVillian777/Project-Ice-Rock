<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/header.css" onerror="alert('CSS file not found!')">
    <link rel="stylesheet" href="css/contact.css" onerror="alert('CSS file not found!')">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="contact.js" defer></script>
</head>
<body>

@include('header')

    <!-- Contact Section -->
    <div class="contact-section">
        <h1>We are here to help!</h1>
        <p>Let us know how we can best help you. Use the contact form below to email us. It's an honor to support you.</p>

        <form class="contact-form" action="{{ route('contactUs') }}" method="post">
            @csrf
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email_address" placeholder="Email" required>
            <input type="tel" name="phone_number" placeholder="Phone Number" required>
            <textarea name="description" rows="5" placeholder="Description"></textarea>
            <button type="submit">Send Message</button>

            @if(session()->has('success'))
                <p id="sucess" style="color:gold; font-weight: bold;">
                {{ session('success') }}
                </p>
            @endif
        </form>
    </div>

    @include('footer')

<script>
    //if the success message appears this shows the user for 4 seconds then routes back to shop
    @if(session()->has('success'))
        const displayMessageTime = 4000;
        setTimeout(function() {
            const successMessage = document.getElementById('success')
            if (successMessage) {
                successMessage.style.display = 'none'
            }
            window.location.href = "{{ route('shop') }}"
        }, displayMessageTime);
    @endif
</script>

</body>
</html>
