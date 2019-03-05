<?php
$servername = "localhost";
$username = "root";
$password = "";


    $conn = new PDO("mysql:host=$servername;dbname=hotel_demo", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  $count = $conn->query("select count(name) from user")->fetch()[0];
  $attenderss = $conn->query("select count(name) from user where position='attender' ")->fetch()[0];
  $cleanerss = $conn->query("select count(name) from user where position='cleaner' ")->fetch()[0];
  
 $result = array();
  $result['total_count'] = $count;
  
 $attender = array();
   $attender['attender_count'] = $attenderss;
  
  
 $cleaner = array();
   $cleaner['cleaner_count'] = $cleanerss;
  
   $result['attenders'] = $attender;
   $result['cleaners'] = $cleaner;
  

  echo json_encode($result);
  ?>