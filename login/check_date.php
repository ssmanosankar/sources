<?php
$date=date('y/m/d');

$conn=new mysqli("localhost","root","","login");

$sql="SELECT name,date,status,reason FROM attendance where date='$date'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
      echo "1";   
   
} else {
    echo "0";
    
}
$conn->close();
?>