<?php

try{
    $conn = new PDO("mysql:host=localhost;dbname=example_db","root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
    $e->getMessage();
}

$user_name = $_POST['user_name'];
$password_given = $_POST['password'];

$password_original = $conn->query("select password from users where user_name = '$user_name'")->fetch()[0];

if($password_given == $password_original)
{
    session_start();
    $_SESSION['user_name'] = $user_name;
    echo "success";
}
else
    echo "Invalid UserName or Password";

?>