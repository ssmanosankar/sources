<?php
$username=$_POST['Username'];
$email=$_POST['email'];
$pass=$_POST['psw'];
$number=$_POST['no'];

$conn=new mysqli("localhost","root","","login");

if(mysqli_connect_error())
{
    echo"error".mysqli_connect_error();
    exit();
}

$sqll="select * from login where email='$email'";

$res=mysqli_query($conn,$sqll);
//echo mysqli_num_rows($res);
if(mysqli_num_rows($res)>0)
{
echo"Email Id Already Exists";
}
else{
$sql = "INSERT INTO login (name,email,phone,password) VALUES ('$username','$email','$number','$pass')";
  
if(mysqli_query($conn,$sql))
{
    echo "sucees";
}
else
{
    echo "error";
}
}
mysqli_close($conn);
?>