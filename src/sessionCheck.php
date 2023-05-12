<?php
$servername = "localhost";
$username = "student";
$password = "CompSci364";
$dbname = "databased";
session_start();

  if (isset($_SESSION['loggedIn'])){
    echo $_SESSION['username'];
}
echo "Test";
echo $_SESSION['username'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn->close();
?>