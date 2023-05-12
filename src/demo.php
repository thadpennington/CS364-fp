<?php 
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $password = $_POST['password'];
      $confirm_password = $_POST['confirmPassword'];

        if ($password === $confirm_password){
            //get form information
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $username = $_POST['username'];
            $email = $_POST['emailAddress'];
            $sex = $_POST['sex'];

            //compute the password hash
            $salt = bin2hex(random_bytes(16));
            $hash_ps = bin2hex(hash('sha256', $password, $salt));

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
            header("Location: index.php");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            $row = $result->fetch_assoc();
            // check if the username is already taken in the database
            if ($row['username'] == $username){
                $_SESSION["name_exists"] = "Username already exists.";
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit;
            
            }else{
                // Prepared statement to add user to the database
                $stmt = $conn->prepare("INSERT INTO Users (firstName, lastName, username, password_hash, email, salt) VALUES (?, ?, ?, ?, ?, ?);");
                $stmt->bind_param("ssssss", $firstName, $lastName, $username, $hash_ps, $email, $salt);
                $stmt->execute();
                echo $email.$firstName.$lastName.$username."\n";    
                echo "IT DID A THING";
                echo $hash_ps;
                echo $salt;
                //add a new value to the database
                //header("Location: index.php");
            }
        }
        else {
            $_SESSION["error"] = "Passwords must match.";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        }
    }
?>
