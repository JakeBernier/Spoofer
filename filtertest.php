<?php
require 'class.phpmailer.php';

$mail = new PHPMailer;

echo "Enter from address:";
$from = fgets(STDIN);
echo "";
echo "Enter from name:";
$fromname = fgets(STDIN);
echo "";
echo "Enter recipient address:";
$recip = fgets(STDIN);
echo "";
echo "Enter recipient name:";
$recipname = fgets(STDIN);
echo "";
echo "\r\n";
echo "\r\n";


echo "Sending Filter Test 1 - EICAR String in Body";

$mail->IsSendmail(); // telling the class to use SendMail transport


$mail->From = "$from";
$mail->FromName = "$fromname";
$mail->AddAddress("$recip", "$recipname");  // Add a recipient
$mail->AddReplyTo("$from", "$fromname");

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Email Filter Test 1';
$mail->Body    = 'This is a test email. EICAR STRING: X5O!P%@AP[4\PZX54(P^)7CC)7}\$EICAR-STANDARD-ANTIVIRUS-TEST-FILE!$H+H* ';
$mail->AltBody = 'This is a test email. EICAR STRING: X5O!P%@AP[4\PZX54(P^)7CC)7}\$EICAR-STANDARD-ANTIVIRUS-TEST-FILE!$H+H* ';

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo "\r\n";
echo 'Filter Test 1 has been sent';
echo "\r\n";
echo "**************************************************************************";
echo "\r\n";


echo "Sending Filter Test 2 - EICAR String in Attachment";

$mail->IsSendmail(); // telling the class to use SendMail transport


$mail->From = "$from";
$mail->FromName = "$fromname";
$mail->AddAddress("$recip", "$recipname");  // Add a recipient
$mail->AddReplyTo("$from", "$fromname");

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->AddAttachment('./test.txt');         // Add attachments
//$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Email Filter Test 2';
$mail->Body    = "This is a test email from $fromname. If you recieve this test message, please forward it back to <b>$from</b>";
$mail->AltBody = "This is a test email from $fromname. If you recieve this test message, please forward it back to $from";

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo "\r\n";
echo 'Filter Test 2 has been sent';
echo "\r\n";
echo "**************************************************************************";
echo "\r\n";


echo "Sending Filter Test 3 - Zip Attachment";

$mail->IsSendmail(); // telling the class to use SendMail transport


$mail->From = "$from";
$mail->FromName = "$fromname";
$mail->AddAddress("$recip", "$recipname");  // Add a recipient
$mail->AddReplyTo("$from", "$fromname");

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->AddAttachment('./test.zip');         // Add attachments
//$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Email Filter Test 3';
$mail->Body    = "This is a test email from $fromname. If you recieve this test message, please forward it back to <b>$from</b>";
$mail->AltBody = "This is a test email from $fromname. If you recieve this test message, please forward it back to $from";

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo "\r\n";
echo 'Filter Test 3 has been sent';
echo "\r\n";
echo "**************************************************************************";
echo "\r\n";


?>
