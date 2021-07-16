<?php

// example usage
$name = "Taha Yasin Köksal"; 
$mailadd = "info@tahayasinkoksal.com.tr"; 
$sub = "Subject"; 
$message = "Hi bro.."; 
$myName ="Taha Yasin Köksal";

echo sendMail($name,$mailadd,$sub,$message,$myName); 


?>



<?php


function sendMail($sendUserNameSurname,$sendMail,$messagesubject,$message,$senderNameSurname)
{
	//Provided by the hosting service
	$MailSmtpHost = "HOST"; 
	$MailUserName = "SENDER-MAIL";
	$MailPassword = "PASSWORD";
	$SMTPPort = 465;





	include ('phpmail/class.phpmailer.php');
	include ('phpmail/class.smtp.php');

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->Host = $MailSmtpHost; 
	$mail->SMTPSecure = 'ssl';  
	$mail->Port = $SMTPPort;  
	$mail->Username = $MailUserName; 
	$mail->Password = $MailPassword; 
	$mail->SetFrom($mail->Username, $senderNameSurname);
	$mail->AddAddress("$sendMail", $sendUserNameSurname); 
	$mail->CharSet = 'UTF-8'; 
	$mail->Subject = $messagesubject; 
	$mail->MsgHTML("$message"); 

	if($mail->Send()) {
		return "Successfully Sent :) ";
	} else {
		return "Error";
	}

	exit;
}






?>