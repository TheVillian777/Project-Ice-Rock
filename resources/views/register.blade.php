<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PageTurner</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>

    <!-- Logo -->
    <header>
        <div class="title">
            <h1>PageTurner</h1>
        </div>
    </header>

    <h1>
        <div class="logo">
            <img src="Logo.jpg" alt="Logo">
        </div>
    </h1>

    <!-- Search bar -->
    <div class="search-box">
        <input type="text" placeholder="Search for books..." id="search-bar">
        <img src="magnifying-glass.png" alt="Search" class="search-icon">
    </div>

    <!-- Banner -->
    <div class="navBar">
        <p>PlaceHolder</p>
    </div>

    <div class="navBar">
        <a class="active" href="index.html">Home</a>
        <a href="New page">Whats new!</a>
        <a href="books page">Books</a>
        <a href="aboutUs.html">About us</a>
      </div>

      <div class="register">
        <h2>Create an Account</h2>
        <h3>Start your IceRock journey by creating your account.</h3>
        <form action="submit_registration.html" method="post" class="register-form">
            <!-- Title -->
            <label for="title">Title*</label>
            <select id="title" name="title" required>
                <option value="" disabled selected>Select Title</option>
                <option value="mr">Mr.</option>
                <option value="mrs">Mrs.</option>
                <option value="ms">Ms.</option>
                <option value="dr">Dr.</option>
                <option value="prof">Prof.</option>
            </select>

            <!-- First and Last Name -->
            <div class="form-row">
                <div class="form-group">
                    <label for="first-name">First Name*</label>
                    <input type="text" id="first-name" name="first-name" required>
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name*</label>
                    <input type="text" id="last-name" name="last-name" required>
                </div>
            </div>

            <!-- Email and Confirm Email -->
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email*</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="confirm-email">Confirm Email*</label>
                    <input type="email" id="confirm-email" name="confirm-email" required>
                </div>
            </div>

            <!-- Password and Confirm Password -->
            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password*</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password*</label>
                    <input type="password" id="confirm-password" name="confirm-password" required>
                </div>
            </div>

            <!-- Terms And Conditions -->
            <div class="form-row terms-row">
                <div class="form-group terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">I agree to Ice-Rocks <a href="terms.html" target="_blank">Terms and Conditions</a></label>
                </div>
                <button type="submit">Register</button>
            </div>
        </form>
    </div>


</body>
</html>

