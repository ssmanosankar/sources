<?php
$id=$_POST['id'];
$name=$_POST['name'];
$age=$_POST['age'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$experience=$_POST['experience'];

$conn=new mysqli("localhost","root","","login");

$sql ="insert into members (id,name,age,phone,address,gender,experience) values ('$id','$name','$age','$phone','$address','$gender','$experience')";

if(mysqli_query($conn,$sql))
echo "suceess";
else
echo "error";
?>

