<!DOCTYPE html>
<html lang="en">

<!-- stylesheet, javascript -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<!-- login Section -->
<div class="container">
    <div class="form-container" id="login-form">
        <h2>Login</h2>

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
            <p>don't have an account? <a href="javascript:void(0);" onclick="showRegisterForm()">Register</a></p>
            <p><a href="javascript:void(0);" onclick="forgottenPassword()">Forgotten your password?</a></p>

        </form>
    </div>

    <!-- register Section -->
    <div class="form-container" id="register-form" style="display: none;">
        <h2>Register</h2>
        <form action="{{ route('register') }}" method="post">
            @csrf
        <!-- input email -->
            <label for="register-email">email:</label>
            <input type="email" id="register-email" name="email" required>

        <!-- input password -->    
            <label for="register-password">password:</label>
            <input type="password" id="register-password" name="password" required>

        <!-- confirm passw -->    
            <label for="register-confirm-password">confirm password:</label>
            <input type="password" id="register-confirm-password" name="confirm-password" required>

        <!-- submit -->
            <button type="submit">register</button>

        <!-- back to login -->    
            <p>Already have an account? <a href="javascript:void(0);" onclick="showLoginForm()">Login</a></p>
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
            alert("write it down!")
    }

</script>

</body>
</html>
