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
        </div>
    </div>

    <h2 class = "headerText">Post Submission: </h2>


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


        // Check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //var_dump($_POST);
            // Get the instructor name, comment, and rating value from the POST data
            $id = (int) $_POST['post_ID'];
        

            // Prepare the SQL statement with placeholders
            $stmt = $conn->prepare("DELETE FROM Posts WHERE id = ?;");

            // Bind the parameters to the placeholders
            $stmt->bind_param("i", $id);

            // Execute the statement
            $stmt->execute();
        
            // Close the statement
            $stmt->close();

            header("Location: my_posts.php");
            // Close the database connection
            $conn->close();
        }
    ?>
</html> 