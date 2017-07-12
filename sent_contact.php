<?php

// Contact subject
$subject ="Reservatie: Zicht op Bilzen"; 

// Details
$name = $_POST['name'];
$phoneNumber = $_POST['phoneNumber'];
$message= $_POST['bericht'];

// Mail of sender
$mail_from= $_POST['mail'];

// From 
$header="from: $name <$mail_from>";

// Enter your email address
$to = "miagijbels@hotmail.com";

$mail_message   .= "NAME: $name\n";
$mail_message   .= "EMAIL: $mail_from\n";
$mail_message   .= "TELEFOON: $phoneNumber\n";
$mail_message   .= "MESSAGE:\n$message\n";



$send_contact = mail($to,$subject,$mail_message,$header);

// Check, if message sent to your email 
// display message "We've recived your information"
if($send_contact){
header("Location:send.html");
die();
}
else {
echo "ERROR";
}
?>