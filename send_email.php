<?php
require 'class.phpmailer.php';
require 'class.smtp.php';
// require_once 'PHPMailer/SMTP.php';
if (isset($_POST['email'])) {

	//$to = "shieldventures1@gmail.com"; // this is your Email address
	$to = "sales.raindrop@gmail.com"; // this is your Email address
	$from = $_POST['email']; // this is the sender's Email address
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$message = $_POST['message'];
	$subject = "Inquiry from a user";
	$message = "Hi Admin,\n\n An inquiry received from <b>$name</b>.\n\n<b>Contact no:</b> $phone\n<b>City:</b> $city\n<b>Country:</b> $country\n\n<b>Message:</b> \n" . $message;

	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
	$mail->Debugoutput = 'html'; //(https://web-solutions.eu/support/how-to-send-e-mails-with-smtp-auth-php-example)
	$mail->SMTPAuth = true; // authentication enabled
	// $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = "localhost";
	$mail->Port = 25; // or 587
	$mail->IsHTML(true);
	$mail->Username = "info@delllaptopservicescentre.com";
	$mail->Password = "4(7c7H0U1;cA";
	$mail->SetFrom($from);
	$mail->Subject = $subject;
	$mail->Body = $message;
	$mail->AddAddress($to);

	if ($mail->Send()) {
		//echo "Mailer Error: " . $mail->ErrorInfo;
		
		echo json_encode(["msg" => "Thanks for your inquiry. We will contact you soon."]);
	} else {
		echo json_encode(["msg" => "Error while sending email."]);
	}

}
?>

