<?php
//get data from form  
$name = $_POST['name'];
$email= $_POST['email'];
$message= $_POST['message'];

$to = "vincearviecube1011@gmail.com";

$subject = "New Email from your Personal Website";
$txt ="Name: ". $name . "\r\nEmail from: " . $email . "\r\nMessage: " . $message;
$headers = "From: noreply@vincearviecube1011.000webhostapp.com" . "\r\n" .
"CC: somebodyelse@example.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:thanks.html");
?>