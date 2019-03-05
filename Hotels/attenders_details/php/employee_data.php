<?php
$servername = "localhost";
$username = "root";
$password = "";


  $conn = new PDO("mysql:host=$servername;dbname=hotel_demo", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$employee_id = $_POST['employee_id'];
//$employee_id = "105";

//Getting the data
$statement = $conn->prepare("select id,name,pw,phone,paddress,laddress,date_of_join,position from user where id = '$employee_id'");
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);

$result = $statement->fetchAll()[0];

echo json_encode($result);

?>