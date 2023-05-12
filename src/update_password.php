<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //var_dump($_POST);
            // Get the instructor name, comment, and rating value from the POST data
            if (isset($_SESSION['username'])){
                $username = $_SESSION['username'];
            }else{
                header("Location: index.php");
            }
            
            $newPassword = $_POST['newPassword'];
            $repPassword = $_POST['repPassword'];
            $oldPassword = $_POST['oldPassword'];

            if($repPassword == $newPassword){
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

                $hash = $row['password_hash'];
                $salt = $row['salt'];
                //echo "Username check passed";
                // Check hash in database with input password
                $hash_ps = bin2hex(hash('sha256', $oldPassword, $salt));

                if ($hash == $hash_ps){
                    //Update the password
                    $newHash = bin2hex(hash('sha256', $newPassword, $salt));

                    $stmt = $conn->prepare("UPDATE Users SET password_hash=? WHERE username = ?");
                    $stmt->bind_param("ss", $newHash, $username);
                    $stmt->execute();
                    
                    header("Location: index.php");
                
                }else{
                    $_SESSION["IV"] = "Incorrect Password";
                    header("Location: {$_SERVER['HTTP_REFERER']}");
                    //exit;
                }

                }else{
                    $_SESSION["error"] = "Passwords must match.";
                    header("Location: {$_SERVER['HTTP_REFERER']}");
                    exit;
            }
    }

?>