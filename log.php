<?php
    require_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="logstyle.css"> 
    <script src="https://kit.fontawesome.com/4f4044b6c2.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        require_once 'connection.php';
    ?>
    <div class="container">
        <div class="form-box" id="loginForm">
            <h1 id="title">Login</h1>
            <form action="db.php" method="post">
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    <p>Forgot password <a href="#">Click Here!</a></p>
                </div>
                <div class="btn-field">
                    <input type="submit" name="Login" value="Login">
                </div>
                <div class="create-account">
                    <p>Don't have an account? <a href="#" id="createAccountLink">Create one now</a></p>
                </div>
            </form>
        </div>
        
        <div class="form-box" id="createAccountForm" style="display: none;">
            <h1 id="title">Create Account</h1>
            <form action="db.php" method="post">
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Your Name" name="name">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-phone"></i>
                        <input type="tel" placeholder="Mobile Number" name="num">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Email" name="em">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" name="rpassword">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Confirm Password" name="conpass">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="text" placeholder="Address" name="addr">
                    </div> 
                </div>
                <div class="btn-field">
                <input type="submit" name="Register" value="Register">
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('createAccountLink').addEventListener('click', function() {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('createAccountForm').style.display = 'block';
        });
    </script>
</body>
</html>