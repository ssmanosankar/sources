<?php
session_start();

$id = @$_POST['number'];
$pass = @$_POST['pass'];
$submit = @$_POST['submit'];

if ($submit) {
if (!isset($_POST['$id'])) {
echo 'Please enter your UserId';
}

if (!isset ($_POST['$pass'])) {
echo 'Please enter your password';

}else if ($id && $pass) {
$connect = mysql_connect("localhost", "root", "") or die ("couldnt connect");
mysql_select_db("login") or die ("couldnt find the db");

$query = mysql_query("SELECT * FROM login WHERE phone = '$id'");

$numrows = mysql_num_rows($query);

if ($numrows == 0) {
	echo 'that username doesnt exist';
}

if ($numrows != 0) {
	//code to log in
	while ($row = mysql_fetch_assoc($query)) {
		$db_id = $row['id'];
		$db_pass = $row['pass'];
	}
	//check to see if they match;
	if ($id == $db_id && md5($pass) == $db_pass) {
		echo "log in successfull, <a href = 'member.php'>Members only</a> click here to enter the member area";
		$_SESSION['phone'] = $db_id;
	}else{
		echo 'Incorrect password';
	}
}
}
}

?>