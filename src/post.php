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
                echo "<a href=\"../src/post.php\">Welcome ".$_SESSION['username']."</a>";
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

    <form id ="myForm" method="post" action="post.php">
        <label for="inputBox">Instructor Name: </label><br>
        <input type="text" id="inputBox" name="instructor" placeholder="Instructor Name" class="InputBox"><br><br>
        <label for="courseBox">Course Name: </label><br>
        <input type="text" id="courseBox" name="course" placeholder="Course Name" class="InputBox"><br><br>
        <label for="commentBox">Comment: </label><br>
        <textarea id="commentBox" name="comment" placeholder="Comment" class="InputBox2"></textarea><br><br>
        <label for="rateBox">Bowtie Rating:</label>
        <div class="rateBox">
                <label for = "num1">1</label>
                <input type = "radio" id = "num1" name = "num" value = "1" checked>
                <label for = "num2">2</label>
                <input type = "radio" id = "num2" name = "num" value = "2" checked>
                <label for = "num3">3</label>
                <input type = "radio" id = "num3" name = "num" value = "3" checked>
                <label for = "num4">4</label>
                <input type = "radio" id = "num4" name = "num" value = "4" checked>
                <label for = "num5">5</label>
                <input type = "radio" id = "num5" name = "num" value = "5"><br>
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


        // Check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // var_dump($_POST);
            // Get the instructor name, comment, and rating value from the POST data
            $instructorName = $_POST['instructor'];
            $course = $_POST['course'];
            $comment = $_POST['comment'];
            $ratingVal = $_POST['num'];
            
            //echo $comment;

            // Check session to get username if signed in
            if (isset($_SESSION['loggedIn'])){
                $user = $_SESSION['username'];
            }else{
                $user = null;
            }

            // Get the max id value from the Posts table
            $max_id_query = "SELECT MAX(id) AS max_id FROM Posts";
            $max_id_result = $conn->query($max_id_query);

            if ($max_id_result->num_rows > 0) {
                $max_id_row = $max_id_result->fetch_assoc();
                $id = $max_id_row["max_id"] + 1;
            } else {
                $id = 1;
            }

            // Prepare the SQL statement with placeholders
            $stmt = $conn->prepare("INSERT INTO Posts (id, instructor, course, rating, content, user) VALUES (?, ?, ?, ?, ?, ?)");

            // Bind the parameters to the placeholders
            $stmt->bind_param("ississ", $id, $instructorName, $course, $ratingVal, $comment, $user);

            // Execute the statement
            if($stmt->execute()) {
                // echo "success";

            } else {
                // echo "failure" . $stmt->error;
            }


            // Close the statement
            $stmt->close();
            // Close the database connection
            $conn->close();
            header("Location: index.php");
        }
    ?>



</html> 