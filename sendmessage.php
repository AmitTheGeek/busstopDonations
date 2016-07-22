<?php
echo "hello";
$sendto   = "youremail@youremail.com";
	$usermail = $_POST['email'];
	$content  = $_POST['message'];

	$subject  = "New Feedback Message";
	$headers  = "From: " . strip_tags($usermail) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($usermail) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html;charset=utf-8 \r\n";

	$msg  = "";
	$msg .= "<h2 style='font-weight: bold; border-bottom: 1px dotted #ccc;'>New User Feedback</h2>\r\n";
	$msg .= "<strong>Sent by:</strong> ".$usermail."\r\n";
	$msg .= "<strong>Message:</strong> ".$content."\r\n";
	$msg .= "";
	
	
	if(@mail($sendto, $subject, $msg, $headers)) {
	echo "true";
} else {
	echo "false";
}
?>