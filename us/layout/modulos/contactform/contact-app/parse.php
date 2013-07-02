<?php
/*
Credits: Bit Repository
URL: http://www.bitrepository.com/
*/

include_once 'headers.php';
include_once 'common.php';
include_once 'phpmailer/class.phpmailer.php';

// Was the method "POST" used? Continue

if(!empty($_POST)) {

include 'functions.php';

// Apply some basic filtering to the inputs

$sender_name = stripslashes(trim($_POST['sender_name']));
$sender_email = stripslashes(trim($_POST['sender_email']));
$sender_subject = stripslashes(trim($_POST['sender_subject']));
$sender_message = stripslashes(trim($_POST['sender_message']));


$error = '';

if($mandatoryFields['sender_name'] == 1) { // Mandatory?

// Check name
if(!$sender_name) {
$error['sender_name'] = 1;
}

}

if($mandatoryFields['sender_email'] == 1) { // Mandatory?

// Check email
if(!$sender_email) {
$error['sender_email_none'] = 1;
}

if($sender_email && !ValidateEmail($sender_email)) {
$error['sender_email'] = 1;
}

}


if($mandatoryFields['sender_subject'] == 1) { // Mandatory?

// Check subject
if(!$sender_subject) {
$error['sender_subject'] = 1;
}

}

if($mandatoryFields['sender_message'] == 1) { // Mandatory?

// Check message (length)
if(!$sender_message || strlen($sender_message) < 15) {
$error['sender_message'] = 1;
}

}

if(USE_CAPTCHA == 1) {

$security_code = trim($_POST['security_code']);

if($security_code == '') {
$error['security_code'] = 1;
} else {
if(md5($security_code) != $_SESSION['captcha_security_code']) {
$error['security_code'] = 2;
}
}

}

if(empty($error)) {

$mail             = new PHPMailer(); // defaults to using php "mail()"

$mail->From       = $sender_email;
$mail->FromName   = $sender_name; 

$mail->AddAddress(WEBMASTER_EMAIL, WEBMASTER_NAME);

// Set the message
$final_message = BODY_MESSSAGE;
$final_message_text = BODY_MESSSAGE_TEXT;

$ip_address = getRealIpAddr();

$ar_subject = AR_SUBJECT;
$ar_message = AR_MESSAGE;
$ar_message_text = AR_MESSAGE_TEXT;

$replacements = array('{sender_name}'       => $sender_name, 
	                  '{sender_email}'      => $sender_email, 
	                  '{sender_ip_address}' => $ip_address,
	                  '{sender_hostname}'   => gethostbyaddr($ip_address),
	                  '{sender_message}'    => $sender_message);

foreach($replacements as $to_replace => $replacement) {

$sender_subject = str_replace($to_replace, $replacement, $sender_subject);
$ar_subject = str_replace($to_replace, $replacement, $ar_subject);

$final_message = str_replace($to_replace, $replacement, $final_message);
$final_message_text = str_replace($to_replace, $replacement, $final_message_text);

$ar_message = str_replace($to_replace, $replacement, $ar_message);
$ar_message_text = str_replace($to_replace, $replacement, $ar_message_text);

}

$mail->Subject = $sender_subject;
$mail->MsgHTML($final_message);
$mail->AltBody = $final_message_text;

/* --- Send the mail --- */

if($mail->Send()) {
$error['status'] = 0; // Mail sent

$mail->ClearAddresses();

if(AUTO_RESPONDER == 1) {

$mail->From    = WEBMASTER_EMAIL;
$mail->FromName = WEBMASTER_NAME;
$mail->Subject = $ar_subject;
$mail->Body    = $ar_message;
$mail->AltBody = $ar_message_text;
$mail->AddAddress($sender_email, $sender_name);


// Send auto responder only if the message was sent
$mail->Send();
}

} else {
$error['status'] = 2; // Mail cannot be sent (internal error)
}

} else {
$error['status'] = 1; // Errors found
}

echo json_encode($error); // output the result that will be processed by init.js

}
?>