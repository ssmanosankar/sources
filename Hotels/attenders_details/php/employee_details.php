<?php
$servername = "localhost";
$username = "root";
$password = "";


    $conn = new PDO("mysql:host=$servername;dbname=hotel_demo", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$employee_category = $_POST['employee_category'];


if($employee_category == "all")
{ 
       $statement = $conn->prepare("select id,name,pw,phone,paddress,laddress,date_of_join,position from user");

}else
 {   $statement = $conn->prepare("select id,name,pw,phone,paddress,laddress,date_of_join,position from user where position = '$employee_category' ");

}

$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$result = $statement->fetchAll();

echo json_encode($result);

?>