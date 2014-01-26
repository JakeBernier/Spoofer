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




//$mail->IsSMTP();                                      // Set mailer to use SMTP
//$mail->Host = 'local';  // Specify main and backup server
//$mail->SMTPAuth = true;                               // Enable SMTP authentication
//$mail->Username = 'jswan';                            // SMTP username
//$mail->Password = 'secret';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->IsSendmail(); // telling the class to use SendMail transport


$mail->From = "$from";
$mail->FromName = "$fromname";
$mail->AddAddress("$recip", "$recipname");  // Add a recipient
//$mail->AddAddress('ellen@example.com');               // Name is optional
$mail->AddReplyTo("$from", "$fromname");
//$mail->AddCC('cc@example.com');
//$mail->AddBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Email Spoof Test';
$mail->Body    = "This is a test email from $fromname. If you recieve this spoofed message, please forward it back to <b>$from</b>";
$mail->AltBody = "This is a test email from $fromname. If you recieve this spoofed message, please forward it back to $from";

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Message has been sent';
echo "\r\n";
echo "   :)   ";
echo "\r\n";
echo "\r\n";

?>
