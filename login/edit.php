<?php
$id=$_POST['id'];
$name=$_POST['name'];
$age=$_POST['age'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$experience=$_POST['experience'];

$conn=new mysqli("localhost","root","","login");

$sql = "update members set name = '$name' , age = $age , phone = '$phone' , address = '$address' , gender = '$gender' , experience = $experience where id=$id";
  
if(mysqli_query($conn,$sql))
echo "suceess";
else
echo "error";
?>
