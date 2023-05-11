<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            var_dump($_POST);
            // Get the instructor name, comment, and rating value from the POST data
            $username = $_POST['username'];
            $password = $_POST['password'];

            $servername = "localhost";
            $usernameMySQL = "student";
            $passwordMySQL = "CompSci364";
            $dbname = "databased";

            // Create connection
            $conn = new mysqli($servername, $usernameMySQL, $passwordMySQL, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $stmt = $conn->prepare("SELECT * FROM Users WHERE username = ?");
            
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            $row = $result->fetch_assoc();
            // check if the username is already taken in the database
            if (!($row['username'] == $username)){
                $_SESSION["name_exists"] = "Invalid Username/Password";
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit;
            }else{
                $hash = $row['hash'];
                $salt = $row['salt'];
                // Check hash in database with input password
                $hash_ps = hash('sha256', $password, $salt);

                if ($hash === $hash_ps){
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['logged_in'] = 1;
                    header("Location: index.php");
                } else {
                    $_SESSION["name_exists"] = "Invalid Username/Password";
                    header("Location: {$_SERVER['HTTP_REFERER']}");
                    exit;
                }
                echo "IT DID A THING";
                //add a new value to the database
            }














    }










?>