<?php

$id = $_POST['id'];

$conn = new PDO("mysql:host=localhost;dbname=hotel_demo", "root", "");

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if($conn->exec("delete from user where id = $id") )
    echo "success";
else
    echo "error";

?>