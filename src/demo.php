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
        $sex = $_POST['sex'];

        //compute the password hash
        $salt = bin2hex(random_bytes(16));
        $hash_ps = hash('sha256', $password, $salt);

        $servername = "localhost";
        $usernameMySQL = "student";
        $passwordMySQL = "CompSci364";
        $dbname = "databased";

        // Create connection
        $conn = new mysqli($servername, $usernameMySQL, $passwordMySQL, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);

        $stmt = $conn->prepare("INSERT INTO Posts (instructor, course, rating, content) ?");
        


        // //check if the username is already taken in the database
        // if (USERNAME EXISTS){
        //     $_SESSION["name_exists"] = "Username already exists."
        //     header("Location: {$_SERVER['HTTP_REFERER']}");
        //     exit;
        // }
        // else {
        //     //add a new value to the database
        // }
    }
    else {
        $_SESSION["error"] = "Passwords must match.";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;
    }
    
    }
    ?>
