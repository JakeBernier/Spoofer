<?php
require 'class.phpmailer.php';

$mail = new PHPMailer;

echo "Enter tester name: ex: john.doe    ";
$testername = readline();
echo "Enter tester domain:   ";
$testerdomain = readline();
echo "Enter target domain:   ";
$tgtdomain = readline();
echo "Enter target email name: ex:foo.bar   "; 
$tgtname = readline();
echo "Enter non-existent domain: ex:d0main.com   ";
$nonxdomain = readline();
echo "Enter tgt non-existent top-lvl domain: ex:domain.org   ";
$toplvldomain = readline();
echo "Enter tester personal email address (to mock customer):   ";
$persemail = readline();
echo "*****************************";


//Some variable foo to make our variety of tests possible


$from_baduser = "$testername@$tgtdomain";
$from_gooduser = "$tgtname@$tgtdomain";
$from_toplvl = "$testername@$toplvldomain";
$from_nonx = "$testername@$nonxdomain";

$tgt_recip = "$tgtname@$tgtdomain";
$testeremail = "$testername@$testerdomain";

$mail->IsSendmail(); // telling the class to use SendMail transport

// testing spoof 1
echo "\r\n";
echo "Spoofing message #1 - from real employee . . .";
echo "\r\n";


$mail->From = "$from_gooduser";
$mail->FromName = "$tgtname";
$mail->AddAddress("$tgt_recip", "$tgtname");  // Add a recipient
$mail->AddReplyTo("$from_gooduser", "$tgtname");

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Email Spoof Test 1';
$mail->Body    = "This is a test email from $testername. If you recieve this spoofed message, please forward it back to <b>$testeremail</b>";
$mail->AltBody = "This is a test email from $testername. If you recieve this spoofed message, please forward it back to $testeremail";

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo "Spoofed message 1 has been sent: $from_gooduser -> $tgt_recip";
echo "\r\n";
echo  '*******************************************';
echo "\r\n";

// testing spoof 2
echo "\r\n";
echo "Spoofing message #2 - from top lvl domain . . .";
echo "\r\n";

$mail->From = "$from_toplvl";
$mail->FromName = "$testername";
$mail->AddAddress("$tgt_recip", "$tgtname");  // Add a recipient
$mail->AddReplyTo("$from_toplvl", "$testername");
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Email Spoof Test 2';
$mail->Body    = "This is a test email from $testername. If you recieve this spoofed message, please forward it back to <b>$testeremail</b>";
$mail->AltBody = "This is a test email from $testername. If you recieve this spoofed message, please forward it back to $testeremail";

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo "Spoofed message 2 has been sent: $from_toplvl -> $tgt_recip";
echo "\r\n";
echo  '*******************************************';
echo "\r\n";

// testing spoof 3
echo "\r\n";
echo "Spoofing message #3 - from non-existance domain . . .";
echo "\r\n";

$mail->From = "$from_nonx";
$mail->FromName = "$testername";
$mail->AddAddress("$tgt_recip", "$tgtname");  // Add a recipient
$mail->AddReplyTo("$from_nonx", "$testername"); 
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Email Spoof Test 3';
$mail->Body    = "This is a test email from $testername. If you recieve this spoofed message, please forward it back to <b>$testeremail</b>";
$mail->AltBody = "This is a test email from $testername. If you recieve this spoofed message, please forward it back to $testeremail";

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo "Spoofed message 3 has been sent: $from_nonx -> $tgt_recip";
echo "\r\n";
echo  '*******************************************';
echo "\r\n";

// testing spoof 4
echo "\r\n";
echo "Spoofing message #4 - from non-existance user . . .";
echo "\r\n";

$mail->From = "$from_baduser";
$mail->FromName = "$testername";
$mail->AddAddress("$tgt_recip", "$tgtname");  // Add a recipient
$mail->AddReplyTo("$from_baduser", "$testername"); 
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Email Spoof Test 4';   
$mail->Body    = "This is a test email from $testername. If you recieve this spoofed message, please forward it back to <b>$testeremail</b>";
$mail->AltBody = "This is a test email from $testername. If you recieve this spoofed message, please forward it back to $testeremail";

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo "Spoofed message 4 has been sent: $from_baduser -> $tgt_recip";
echo "\r\n";
echo  '*******************************************';
echo "\r\n";

// testing spoof 5
echo "\r\n";
echo "Spoofing message #5 - spoof real domain to external user . . .";
echo "\r\n";

$mail->From = "$from_gooduser";
$mail->FromName = "$tgtname";
$mail->AddAddress("$persemail", "$testername");  // Add a recipient
$mail->AddReplyTo("$from_gooduser", "$tgtname"); 
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Email Spoof Test 5';   
$mail->Body    = "This is a test email from $testername. If you recieve this spoofed message, please forward it back to <b>$testeremail</b>";
$mail->AltBody = "This is a test email from $testername. If you recieve this spoofed message, please forward it back to $testeremail";

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo "Spoofed message 5 has been sent: $from_gooduser -> $persemail";
echo "\r\n";
echo  '*******************************************';
echo "\r\n";


?>
