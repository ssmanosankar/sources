<?php
$id = $_POST['id'];
$servername = "localhost";
$username = "root";
$password = "";

    $conn = new PDO("mysql:host=$servername;dbname=login", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM members where id=$id");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data_set = $stmt->fetchAll();

echo json_encode($data_set[0]);


$conn = null;

?>