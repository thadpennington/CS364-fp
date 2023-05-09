<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { // Get the form data
$name = $_POST["username"]; $email = $_POST["emailAddress"]; $password_hash = $_POST["password"]; // Display the form data 
echo "Name: " . $name . "<br>";
echo "Email: " . $email . "<br>"; 
echo "Password_hash: " . $password_hash . "<br>"; }
?>