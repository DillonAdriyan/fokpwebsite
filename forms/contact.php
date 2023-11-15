<?php

$to      = 'dillon.adrian00@gmail.com';
$subject = $_POST['subject'];
$message = $_POST['message'];
$headers = 'From: '. $_POST["email"] . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);



 ?>