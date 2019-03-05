<?php
$servername = "localhost";
$username = "root";
$password = "";


  $conn = new PDO("mysql:host=$servername;dbname=hotel_demo", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dealer_name = $_POST['dealer_name'];
//$employee_id = "105";

//Getting the data
$statement = $conn->prepare("select * from dealer where id = '$dealer_name'");
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);

$result = $statement->fetchAll()[0];

echo json_encode($result);

?>