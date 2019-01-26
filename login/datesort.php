<?php
$from=$_POST['date1'];
$to=$_POST['date2'];
$servername = "localhost";
$username = "root";
$password = "";

    $conn = new PDO("mysql:host=$servername;dbname=login", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM attend where date between '$from' and '$to'");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data_set = $stmt->fetchAll();

echo json_encode($data_set);


$conn = null;

?>