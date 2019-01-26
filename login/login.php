
<?php
$id=$_POST['number'];
$pass=$_POST['pass'];

$conn=new mysqli("localhost","root","","login");

$sql="select * from login where phone='$id' and password='$pass'";
$res=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($res);

if($row['phone']==$id && $row['password']=$pass)
{
    header('Location:dashboard.html');
    exit;

}
else{
    echo"password wrong";
}
?>
