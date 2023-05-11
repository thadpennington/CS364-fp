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

  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()) {
	echo $row["content"];
  }
  $stmt->close();
  $result->free();

  $conn->close();
}
?>
