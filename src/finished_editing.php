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
        }

            $instructorName = $_POST['instructor'];
            $course = $_POST['course'];
            $comment = $_POST['comment'];
            $ratingVal = $_POST['num'];
            $id = $_POST['PID'];

            // do something with $myInputValue
            $stmt = $conn->prepare("UPDATE Posts SET instructor = ?, course = ?, rating = ?, content = ? WHERE id = ?");

            $stmt->bind_param("ssisi", $instructorName, $course, $ratingVal, $comment, $id);
            
            $stmt->execute();

            $stmt->close();

            header("Location: my_posts.php");

            $conn->close();
    ?>