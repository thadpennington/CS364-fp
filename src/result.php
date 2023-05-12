<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <link rel="icon" href="../assets/placeholder.jpg" type="image/png">
        <title>USAFA Feedback Finder</title>
        <script src="../assets/suggestions.js" defer></script>
        <link href="../assets/result.css" rel="stylesheet" />
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
            <div class="logo" onclick="window.location.href='index.php'">
                <a href="../src/index.php"><img src="../assets/placeholder.jpg" height="50" width="180" /></a>
            </div>
        </div>
        <a href="https://www.usafa.edu">USAFA</a>
        <div class="topnav-right">
            <?php 
            session_start();
            if (isset($_SESSION['loggedIn'])){
                echo "<a href=\"../src/post.php\">Post</a>";
                echo "<a href=\"../src/my_posts.php\">My Posts</a>";
                echo "<a href=\"../src/account_info.php\">Welcome ".$_SESSION['username']."</a>";
                echo "<a href=\"../src/log_out.php\">Log Out</a>";
            } else {
                echo "<a href=\"../src/post.php\">Post</a>";
                echo "<a href=\"../src/log_in.php\">Log In</a>";
                echo "<a href=\"../src/sign_up.php\">Sign Up</a>";
            }
            ?>
        
            <!-- <a href="../src/post.php">Post</a>
            <a href="../src/log_in.php">Log In</a>
            <a href="../src/sign_up.php">Sign Up</a> -->
        </div>
    </div>

    <!-- php include 'test.php' ; ?> -->

    <form id = "search_bar" method="post" action="result.php">
        <input name="searchbox" type="text" id="search" placeholder="Instructor Name" class="searchbox">
        <button type="submit" value="Search" class="searchButton">Search</button>
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

            // do something with $myInputValue
            $stmt = $conn->prepare("SELECT * FROM Posts WHERE instructor LIKE ?");

            $instructor = "%$myInputValue%";
            $stmt->bind_param("s", $instructor);
            $stmt->execute();

            echo "<div class = \"spacing\">";
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                echo "<div class=\"postBox\"><h4>Anonymous<br>".$row["instructor"]."<br>".$row["course"]."</h4><br><p>".$row["content"]."</p>";
                    echo "<div class=\"rating\"<p>".$row["rating"]."<p></div>";
                    echo "<div class=\"bowtie\"><img src=\"../assets/bow-tie.png\" height=\"10\" width=\"12\"/></div>";
                    echo "</div>";
            }
            echo "</div>";
            $stmt->close();
            $result->free();

            $conn->close();
        }
    ?>

    <!-- <div class = "spacing">
        <div class="postBox">
            <h4>Anonymous<br>Joel Coffman</h4>
            <br><p>insert review here</p>
        </div>
        <div class="postBox">
            <h4>Anonymous<br>Joel Coffman</h4>
            <br><p>insert review here 2</p>
        </div>
        <div class="postBox">
            <h4>Anonymous<br>Joel Coffman</h4>
            <br><p>insert review here 3</p>
        </div>
    </div> -->

</html> 
