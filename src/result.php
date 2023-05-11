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

    <?php
        $servername = "localhost";
        $username = "student";
        $password = "CompSci364";
        $dbname = "databased";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{
            //echo "Successful connection";
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $myInputValue = $_POST['searchbox'];

            // do something with $myInputValue
            $stmt = $conn->prepare("SELECT * FROM Posts WHERE instructor LIKE ?");

            $instructor = "%$myInputValue%";
            $stmt->bind_param("s", $instructor);
            $stmt->execute();

            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                echo "<div class=\"postBox\"><h4>Anonymous&nbsp".$row["instructor"]."</h4><br><p>".$row["content"]."</p></div>";
            }
            $stmt->close();
            $result->free();

            $conn->close();
        }
    ?>

    <!--
    <div class="postBox">
        <h4>Anonymous&nbsp$row["instructor"]</h4>
        <br><p>$row["content"]</p>
    </div> -->

    <form method="post" action="result.php">
        <input name="searchbox" type="text" id="search" placeholder="Instructor Name" class="searchbox">
        <button type="submit" value="Search" class="searchButton">Search</button>
    </form>
</html> 
