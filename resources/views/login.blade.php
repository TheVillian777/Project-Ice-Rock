<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="container">
    <!-- login Section -->
    <div class="form-container" id="login-form">
        <h2>login</h2>
        <form action="#" method="post">
            <label for="login-email">email:</label>
            <input type="email" id="login-email" name="email" required>

            <label for="login-password">password:</label>
            <input type="password" id="login-password" name="password" required>

            <button type="submit">login</button>

            <p>don't have an account? <a href="javascript:void(0);" onclick="showRegisterForm()">register</a></p>
            <p><a href="javascript:void(0);" onclick="forgottenPassword()">forgotten your password?</a></p>

        </form>
    </div>

    <!-- register Section -->
    <div class="form-container" id="register-form" style="display: none;">
        <h2>register</h2>
        <form action="#" method="post">

            <label for="register-email">email:</label>
            <input type="email" id="register-email" name="email" required>

            <label for="register-password">password:</label>
            <input type="password" id="register-password" name="password" required>

            <label for="register-confirm-password">confirm password:</label>
            <input type="password" id="register-confirm-password" name="confirm-password" required>

            <button type="submit">register</button>

            <p>already have an account? <a href="javascript:void(0);" onclick="showLoginForm()">login</a></p>
        </form>
    </div>
</div>

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
