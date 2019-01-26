<?php
$servername = "localhost";
$username = "root";
$password = "";

    $conn = new PDO("mysql:host=$servername;dbname=login", $username, $password);
//$conn=new mysqli("localhost","root","","login");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//$sqll="select * from members";

//$res=mysqli_query($conn,$sqll);
$stmt = $conn->prepare("SELECT id,name FROM members");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data_set = $stmt->fetchAll();

//while($row = mysqli_fetch_array($res)) {

  //  $rows[] = $row;

//}

print json_encode($data_set);

//echo json_encode($row);

$conn = null;

?>