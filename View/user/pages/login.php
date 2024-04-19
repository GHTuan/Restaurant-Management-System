<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"], button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-container input[type="submit"]:hover,button:hover {
            background-color: #45a049;
        }

        #login-notifications {
            margin-bottom: 10px;
            padding: 20px;
            border-radius: 10px;
            background-color: greenyellow;
        }
        button{
            display: inline-block;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<?php
require('View/user/layouts/navbar.php');
?>

<body>
    <?php
    if ($error) {
        echo "<div style='color:red' id='login-notifications'>";
        echo ($error);
        echo "</div>";
    }
    if ($success) {
        echo "<div style='color:green' id='login-notifications'>";
        echo ($success);
        echo "</div>";
    }
    ?>
    <div id="login-form">
        <div class="login-container">
            <h2>Login</h2>
            <form action="index.php?controller=login&action=login" method="post">
                <input type="hidden" name="action" value="login">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="submit" value="Login">
            </form>
        </div>
        <div style="margin-top: 10px; text-align:center;">
            <span>Don't have an account? </span>
            <button id="register">Register</button>
        </div>
    </div>
    <div class="hidden" id="register-form">
        <div class="login-container">
            <h2>Register</h2>
            <form action="index.php?controller=login&action=register" method="post">
                <input type="hidden" name="action" value="register">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="text" name="name" placeholder="Name" required><br>
                <input type="text" name="phoneNo" placeholder="Phone Number" required><br>
                <input type="text" name="avatar" placeholder="Avatar"><br>
                <input type="submit" value="Register">
            </form>
        </div>
        <div style="margin-top: 10px; text-align:center;">
            <span>Already have an account? </span>
            <button id="login">Login</button>
        </div>
    </div>
</body>
<script>
    document.getElementById('register').addEventListener('click', function() {
        document.getElementById('login-form').classList.add('hidden');
        document.getElementById('register-form').classList.remove('hidden');
    });
    document.getElementById('login').addEventListener('click', function() {
        document.getElementById('login-form').classList.remove('hidden');
        document.getElementById('register-form').classList.add('hidden');
    });
</script>

</html>