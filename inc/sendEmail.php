<?php require("class.phpmailer.php");
require("class.smtp.php");
include("pass.php");


if($_POST) {
   $mail = new PHPMailer();
   $mail->IsSMTP();
   $mail->Host = "mail.alejandronadal.com";
   $mail->SMTPAuth = true;
   $mail->Username = "mailer@alejandronadal.com";
   $mail->Password = $emailPass;
   $mail->WordWrap = 50;
   $mail->isHTML(true);
   $mail->From ="mailer@alejandronadal.com";
   $mail->FromName="Mailer";
   $name = trim(stripslashes($_POST['contactName']));
   $replyAddress = trim(stripslashes($_POST['contactEmail']));
   $mail->AddAddress("alexandronadal@gmail.com");
   $mail->AddReplyTo($replyAddress, "Informacion");
   
   $subject = trim(stripslashes($_POST['contactSubject']));
   $contact_message = trim(stripslashes($_POST['contactMessage']));

   // Check Name
	if (strlen($name) < 2) {
		$error['name'] = "Please enter your name.";
	}
	// Check Email
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $replyAddress)) {
		$error['email'] = "Please enter a valid email address.";
	}
	// Check Message
	if (strlen($contact_message) < 15) {
		$error['message'] = "Please enter your message. It should have at least 15 characters.";
	}
   // Subject
	if ($subject == '') { $subject = "Contact Form Submission"; }


	// Set Message
   	$message .= "Email from: " . $name . "<br />";
	$message .= "Email address: " . $email . "<br />";
	$message .= "Message: <br />";
	$message .= $contact_message;
	$message .= "<br /> ----- <br /> This email was sent from your site's contact form. <br />";


   if (!$error) {

	$mail->Subject = $subject;
	$mail->Body = $message;

	if ($mail->Send()) 
	{ 
		echo "OK"; 
	}
	else { 
		echo "Something went wrong. Please try again."; 
	}
		
   } # end if - no validation error
   else {

	$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
	$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
	$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
	
	echo $response;

   } # end if - there was a validation error

}

?>
