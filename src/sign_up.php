<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <link rel="icon" href="../assets/placeholder.jpg" type="image/png">
        <title>Sign Up</title>
        <link href="../assets/sign_up.css" rel="stylesheet" />
        <style>
            body {
                background-image: url('../assets/cadet_chapel.jpg');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%; /* streches image to fit screen */
                background-position: center;
            }
        </style>
    </head>

    <div class="topnav">
        <div class="topnav-centered">
            <div class="logo" onclick="window.location.href='index.php'">
                <a href="../src/index.php"><img src="../assets/placeholder.jpg" height="50" width="180" /></a>
            </div>
        </div>
        <a href="https://www.usafa.edu">USAFA</a>
        <div class="topnav-right">
            <a href="../src/post.php">Post</a>
            <a href="../src/log_in.php">Log In</a>
            <a href="../src/sign_up.php">Sign Up</a>
        </div>
    </div>

    <body>
        <div class = "form">
            <form method ="post" action = "demo.php">
            <?php session_start(); ?>
                <?php if (isset($_SESSION["name_exists"])): ?>
                <p id="error-message-user" style="display: block; color: red;">Username already exists.</p>
                <?php unset($_SESSION["name_exists"]); ?>
                <?php else: ?>
                    <p id="error-message-user" style="display: none; color: red;">Username already exists.</p>
                <?php endif; ?>
                <label for="firstName">First Name:</label><br>
                <input type="text" id="firstName" name="firstName" minlength="2" maxlength="15" pattern="[a-zA-Z\-]+" required><br>
                <label for="lastName">Last Name:</label><br>
                <input type="text" id="lastName" name="lastName" minlength="2" maxlength="15" pattern="[a-zA-Z\-]+" required><br>
                <label for = "emailAddress">Email Address:</label><br>
                <input name = "emailAddress" type = "email" pattern = "^[a-zA-Z0-9\-_.]+@[a-zA-Z0-9\-_.]+\.[a-zA-Z]{2,}$" maxlength="50" required><br>
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" minlength="3" maxlength="15" pattern="[a-zA-Z0-9_]+" required><br>
                <label for = "password">Password:</label><br>
                <input name = "password" type="text" id="password" pattern="^(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?$%&])[A-Za-z0-9#?$%&]{7,}$" autofocus required title = "Password must contain 7 characters minimum, one capital, one number, and one special character." maxlength="50"><br>
                <label for = "confirmPassword">Confirm Password:</label><br>
                <input name = "confirmPassword" type="text" id="confirmPassword" pattern="^(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?$%&])[A-Za-z0-9#?$%&]{7,}$" autofocus required maxlength="50"><br>
                <p>Gender:</p>
                <label for = "sex1">Male</label>
                <input type = "radio" id = "sex1" name = "sex" value = "male" checked>
                <label for = "sex2">Female</label>
                <input type = "radio" id = "sex2" name = "sex" value = "female"><br>
                <input type="submit" value="Submit">
                <?php if (isset($_SESSION["error"])): ?>
                <p id="error-message" style="display: block; color: red;">Passwords must match.</p>
                <?php unset($_SESSION["error"]); ?>
                <?php else: ?>
                    <p id="error-message" style="display: none; color: red;">Passwords must match.</p>
                <?php endif; ?>
            </form>
        </div>

    </body>
</html>