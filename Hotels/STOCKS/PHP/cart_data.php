<?php
$servername = "localhost";
$username = "root";
$password = "";


    $conn = new PDO("mysql:host=$servername;dbname=hotel_demo", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $conn->prepare("select * from dealer");
    
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $result = $statement->fetchAll();

    echo json_encode($result);

?>