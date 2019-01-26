<?php
$servername = "localhost";
$username = "root";
$password = "";

    $conn = new PDO("mysql:host=$servername;dbname=login", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $st=$conn->prepare("SELECT count(name) FROM members");
    $st->execute();
  
   $count=$st->fetch();
    
    // echo $count[0];
    $count = $count[0];
    if(isset($_POST['name_1'])){
        echo 1;
    }
    for($i=1;$i<=$count;$i++)
    {
    $name=$_POST['name_'.$i];
    $date=$_POST['date_'.$i];
    $status=$_POST['status_'.$i];
    $reason=$_POST['reason_'.$i];
    
    $stmt=$conn->prepare("INSERT INTO attendance (name,date,status,reason) VALUES($name,$date,$status,$reason)");
    if($stmt->excute())
    {
        echo "success";
    }else
    {
        echo "error";
    }
    }

$conn = null;

?>