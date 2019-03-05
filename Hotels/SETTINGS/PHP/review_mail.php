<?php     
$to_email = 'maribhuvan98@gmail.com';
$subject = 'Customer Review To Tentrecen';
$message = $_POST['comment'];
$headers = 'From: noreply@company.com';
mail($to_email,$subject,$message,$headers);
?>
