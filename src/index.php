<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <link rel="icon" href="../assets/placeholder.jpg" type="image/png">
        <title>USAFA Feedback Finder</title>
        <script src="../assets/suggestions.js" defer></script>
        <link href="../assets/index.css" rel="stylesheet" />
        <style>
            body {
                background-image: url('../assets/chapel.png');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%; /* streches image to fit screen */
                background-position: center;
            }
        </style>
    </head>

    <div class="topnav">
        <div class="topnav-centered">
            <div class="logo" onclick="window.location.href='index.html'">
                <a href="../src/index.html"><img src="../assets/placeholder.jpg" height="50" width="180" /></a>
            </div>
        </div>
        <a href="https://www.usafa.edu">USAFA</a>
        <div class="topnav-right">
            <a href="../src/log_in.html">Log In</a>
            <a href="../src/sign_up.php">Sign Up</a>
        </div>
    </div>

    <!-- php include 'test.php' ; ?> -->

    <form method="post" action="result.php">
        <input name="searchbox" type="text" id="search" placeholder="Instructor Name" class="searchbox">
        <button type="submit" value="Search" class="searchButton">Search</button>
    </form>
</html> 
