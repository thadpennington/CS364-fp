<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <link rel="icon" href="../assets/placeholder.jpg" type="image/png">
        <title>USAFA Feedback Finder</title>
        <script src="../assets/suggestions.js" defer></script>
        <link href="../assets/post.css" rel="stylesheet" />
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
            <a href="../src/post.html">Post</a>
            <a href="../src/log_in.html">Log In</a>
            <a href="../src/sign_up.php">Sign Up</a>
        </div>
    </div>

    <form method="post" action="post.php">
        <label for="inputBox">Instructor Name: </label><br>
        <input type="text" id="inputBox" name="instructor" placeholder="Instructor Name" class="InputBox"><br><br>
        <label for="commentBox">Comment: </label><br>
        <input type="text" id="commentBox" name="comment" placeholder="Comment" class="InputBox2"><br><br>
        <div class="rateBox">
            <label for="rating">Select a bowtie rating <img src="../assets/bow-tie.png" height="10" width="20">:</label><br>
            <input type="button" value="1" onclick="document.getElementById('rating').value='1'">
            <input type="button" value="2" onclick="document.getElementById('rating').value='2'">
            <input type="button" value="3" onclick="document.getElementById('rating').value='3'">
            <input type="button" value="4" onclick="document.getElementById('rating').value='4'">
            <input type="button" value="5" onclick="document.getElementById('rating').value='5'"><br>
            <input type="hidden" id="rating" name="rating"><br>
        </div>
        <button type="submit" value="Submit" class="inputButton">Submit</button>
    </form>

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
            $courseInput = 



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



</html> 