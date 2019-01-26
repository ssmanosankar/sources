<?php
$servername = "localhost";
$username = "root";
$password = "";

    $conn = new PDO("mysql:host=$servername;dbname=login", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM members");
    $st=$conn->prepare("SELECT count(name) FROM members");
    $stmt->execute();
    $st->execute();
    // $st->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data_set = $stmt->fetchAll();
    $count=$st->fetch();
   
   
    // echo $count[0];
    $count = $count[0];
    echo json_encode($data_set);


$conn = null;

?>