<!DOCTYPE html>
<html lang="en">

<!-- stylesheet, javascript -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="css/login.css" onerror="alert('CSS file not found!')">
    <script type="text/javascript" src="darkmode.js" defer></script>
</head>
<body>

<!-- nav bar  -->
<div class="navBar">
        <a href="{{ route('index') }}">Home</a>
</div>


<!-- login Section -->
<div class="container">
    <!-- dark mode -->
     <button id="theme-switch">
     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg>
     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
    </button>

    <div class="form-container" id="login-form">
        <h2>Login</h2>
        @if (session('message'))
            <p style="color: red;">{{ session('message') }}</p>
        @endif
        <!-- login form -->
        <form action="{{ route('login') }}" method="post">
            @csrf
        <!-- input email -->
            <label for="login-email">Email:</label>
            <input type="email" id="login-email" name="email" required>

        <!-- input password -->
            <label for="login-password">Password:</label>
            <input type="password" id="login-password" name="password" required>

        <!-- submit -->
            <button type="submit">login</button>

        <!-- hyperlinks for forgotten password, register -->
            <p>Don't have an account? <a href="javascript:void(0);" onclick="showRegisterForm()">Register</a></p>
            <p><a href="javascript:void(0);" onclick="forgottenPassword()">Forgotten your password?</a></p>

        </form>
    </div>

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

        <!-- confirm passw -->    
            <label for="register-confirm-password">Confirm Password:</label>
            <input type="password" id="register-confirm-password" name="confirm-password" required>

        <!-- security question -->
            <label for="register-security-answer">enter your security answer:</label>
            <input type="text" id="register-security-answer" name="security_answer" placeholder="What's the name of your first pet?" required>

        <!-- submit -->
            <button type="submit">Register</button>

        <!-- back to login -->    
            <p>Already have an account? <a href="javascript:void(0);" onclick="showLoginForm()">Login</a></p>
        </form>
    </div>

    <!-- forgotten password Section -->
     <div class="form-container" id="forgottenPassword-form" style="display: none;">
        <h2>Forgotten Password</h2>

        @if ($errors->any())
                <p style="color: red;">{{ $errors }}</p>
        @endif
        
        <form action="{{ route('forgottenPassword') }}" method="post">
            @csrf
        <!-- enter email -->
            <label for="forgotten-email">email:</label>
            <input type="email" id="forgotten-email" name="email" required>
        
        <!-- security question answer -->
            <label for="forgotten-security-question">security question answer:</label>
            <input type="security-answer" id="forgotten-security-question" name="security_answer" placeholder="What's the name of your first pet?" required>

        <!-- input password -->    
            <label for="register-password">password:</label>
            <input type="password" id="register-password" name="password" required>

        <!-- confirm password -->    
            <label for="register-confirm-password">confirm password:</label>
            <input type="password" id="register-confirm-password" name="confirm-password" required>
        
        <!-- submit -->
            <button type="submit">Confirm</button>
        </form>
    </div>
</div>

<!-- defining functions -->
<script>
    function showLoginForm() {
        document.getElementById('login-form').style.display = 'block';
        document.getElementById('register-form').style.display = 'none';
    }

    function showRegisterForm() {
        document.getElementById('login-form').style.display = 'none';
        document.getElementById('register-form').style.display = 'block';
    }
 
    function forgottenPassword() {
        document.getElementById('login-form').style.display = 'none';
        document.getElementById('register-form').style.display = 'none';
        document.getElementById('forgottenPassword-form').style.display = 'block';
    }

<<<<<<< Updated upstream
    document.addEventListener('DOMContentLoaded', () => {
        @if ($errors->any())
            forgottenPassword();
        @endif
    });

</script>
<<<<<<< HEAD
=======
</script>
<<<<<<< HEAD
=======

>>>>>>> parent of 26bef1a (merge)
>>>>>>> Stashed changes
=======
>>>>>>> c8d3bb9e84e00f992c905c787a5a28c271222f31
</body>
</html>