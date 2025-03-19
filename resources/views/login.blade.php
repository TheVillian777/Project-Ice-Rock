<!DOCTYPE html>
<html lang="en">

<!-- stylesheet, javascript -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="css/login.css" onerror="alert('CSS file not found!')">
</head>
<body>

<!-- nav bar  -->
<div class="navBar">
        <a href="{{ route('index') }}">Home</a>
</div>


<!-- login Section -->
<div class="container">
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

    document.addEventListener('DOMContentLoaded', () => {
        @if ($errors->any())
            forgottenPassword();
        @endif
    });

</script>
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
</body>
</html>
