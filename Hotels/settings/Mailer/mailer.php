<?php
ini_set('max_execution_time', 10000);
include_once "class.phpmailer.php";
include_once "class.smtp.php";

$name = $_SESSION['name'];
$email = $_SESSION['mail'];
$subject = $_SESSION['subject'];
$message = $_SESSION['message'];


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->Mailer = "smtp";
$mail->SMPTSecure = 'ssl';
//$mail->Host = 'smtp.gmail.com';
$mail->Host = '';
$mail->Port = 465;
$mail->Username = "";
$mail->Password = "";
$mail->SetFrom("");
//$date = date('d/m/Y');
$mail->Subject = "New message from website.";
$mail->Body = "NEW USER CONTACTED YOU via WEB SITE : ";

$mail->AddAddress("");

$_SESSION['MailerMsg'] = 1;

if (!$mail->Send()) {
    // If sent fails
    $mailermsg = 0;
    $_SESSION['MailerMsg'] = $mailermsg;
} else {
    $mailermsg = 1;
    $_SESSION['MailerMsg'] = $mailermsg;
}


?>
