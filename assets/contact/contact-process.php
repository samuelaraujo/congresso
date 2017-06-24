<?php

define("WEBMASTER_EMAIL", 'congressojuridicoacre@gmail.com');

$error = false;
$fields = array( 'name','email', 'phone', 'message' );

foreach ( $fields as $field ) {
	if ( empty($_POST[$field]) || trim($_POST[$field]) == "" )
		$error = true;
}

if ( !$error ) {

	$name    = stripslashes($_POST['name']);
	$email   = trim($_POST['email']);
	$phone   = stripslashes($_POST['phone']);
	$message = stripslashes($_POST['message']);

	$mail = @mail(WEBMASTER_EMAIL, "You have a new message.",
		 "From: " . $name . " <" . $email . ">\r\n" . "Phone:" . "<" . $phone . ">"
		."Reply-To: " . $email . "\r\n"
		."Content: " . $message . "\r\n"
		."X-Mailer: PHP/" . phpversion());

	if ( $mail ) {
		echo 'Success';
	} else {
		echo $error;
	}
}

?>