<?
$to      = 'sam241997@gmail.com';
$subject = 'The test for php mail function';
$message = 'Hello';
$headers = 'From: test@test.com' . "\r\n" .
    'Reply-To: test@test.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
echo mail($to, $subject, $message, $headers);
?>