<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$st = "SELECT count(name) FROM members";

$count=mysqli_query($conn,$st); 
//$total = $count[0];

echo "Total rows: " . $count;

$conn->close();

?>
