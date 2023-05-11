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
            <form method = "post" action = "valid.php" onsubmit="return this.checkValidity()">
                <label for = "emailAddress">Email Address:</label><br>
                <input name = "emailAddress" type = "email" pattern = "^[a-zA-Z0-9\-_.]+@[a-zA-Z0-9\-_.]+\.[a-zA-Z]{2,}$" maxlength="50" required><br>
                <label for = "pswrd">Password:</label><br>
                <input name = "pswrd" type="password" id="password" name="password" pattern="^(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?$%&])[A-Za-z0-9#?$%&]{15,}$" required><br><br>
                <input type = "submit" value = "Submit">
            </form>
        </div>
        <script src = "MAKE THE SCRIPT" defer></script>
    </body>
</html>