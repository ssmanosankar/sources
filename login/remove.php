<?php

$id = $_POST['id'];

$conn = new PDO("mysql:host=localhost;dbname=login", "root", "");
//$conn=new mysqli("localhost","root","","login");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if($conn->exec("delete from members where id = $id") )
    echo "success";
else
    echo "error";

?>