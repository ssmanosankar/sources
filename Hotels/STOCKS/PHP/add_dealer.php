<?php
$dealers_name=$_POST['d_name'];
$dealers_contact=$_POST['d_contact'];
$dealers_category=$_POST['d_category'];
$dealers_nick=$_POST['d_nick'];
$dealers_address=$_POST['d_address'];
$dealers_purchase=$_POST['d_purchase'];
$dealers_itemsize=$_POST['d_size'];
$dealers_amount=$_POST['d_amount'];

$conn=new mysqli("localhost","root","","hotel_demo");
$sql ="insert into dealer (dealer_name,contact_number,dealer_category,nick_name,dealer_address,dealer_purchase,item_size,dealer_amount) values ('$dealers_name','$dealers_contact','$dealers_category','$dealers_nick','$dealers_address','$dealers_purchase','$dealers_itemsize','$dealers_amount')";
if(mysqli_query($conn,$sql))
echo "suceess";
else
echo "error";
?>