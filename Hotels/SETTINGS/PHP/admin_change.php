<?php
$pass=$_POST['oldpw'];
$new=$_POST['newpw'];
$newpass=$_POST['conpw'];
//$pass="Mari111198";
//$newpass="Mari1111";
$conn=new mysqli("localhost","root","","hotel_demo");
$sql="UPDATE admin set pw='$newpass' where pw='$pass'";
if(mysqli_query($conn,$sql))
{
    echo "1";
}
else
{
    echo "0";
}
?>