<?php
error_reporting (E_ALL ^ E_NOTICE);

// To (here you should enter the e-mail address where you should receive the messages)
define('WEBMASTER_EMAIL', '');

// your name/nickname
define('WEBMASTER_NAME', 'Webmaster');

// Enable AutoResponder (true or false)

define('AUTO_RESPONDER', true);

// Use captcha

define('USE_CAPTCHA', true);

// Sets the mandatory fields (1 - required; 0 - not required)

$mandatoryFields = array('sender_name'    => 1, 
                         'sender_email'   => 1,
						 'sender_subject' => 1,
						 'sender_message' => 1);

/* If used, {name} is replaced with the value of 'sender_name' from the contact form ;-) */

/*
----- AutoResponder Mail Subject -----
*/
define('AR_SUBJECT', 'Thank you for contacting us');

/*
----- Customize AutoResponder Mail Message -----
*/

// html version

define('AR_MESSAGE', "Greetings <strong>{sender_name}</strong>,<br /><br />

This is an automated mail sent to notify you that we have received your message. We will give you a reply as soon as possible.<br /><br />

Best Regards");

// non-html version

define('AR_MESSAGE_TEXT', "Greetings {sender_name},

This is an automated mail sent to notify you that we have received your message. We will give you a reply as soon as possible.

Best Regards");

/*
----- The actual message you will receive to your WEBMASTER_EMAIL address -----
*/

// html version

define('BODY_MESSSAGE', "{sender_name} just sent you a message through the contact form:<br /><br />

E-Mail: <a href='mailto:{sender_email}'>{sender_email}</a><br />
IP: {sender_ip_address} ({sender_hostname})<br /><br />

{sender_message}");


// non-html version

define('BODY_MESSSAGE_TEXT', "{sender_name} just sent you a message through the contact form:

E-Mail: {sender_email}
IP: {sender_ip_address} ({sender_hostname})

{sender_message}");


/* 
Gets local path to the form script (example: /home/mysite.com/public_html/contactForm/) 

To set it manually, just change the value of this variable
*/

$localPath = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen(substr(strrchr($_SERVER['SCRIPT_FILENAME'], '/'), 1)));

function getURLtoFormDir() {

if(!isSet($_SERVER['SCRIPT_URI'])) {
$script_uri = ( ($_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
} else {
$script_uri = $_SERVER['SCRIPT_URI'];
}

return substr($script_uri, 0, -strlen(substr(strrchr($script_uri, '/'), 1)));
}

$urlPath = getURLtoFormDir();

$showForm = true;

if(WEBMASTER_EMAIL == '') {
echo "<p>Before using the form, please add the e-mail address that will be used to receive the messages. To do this, go to <em>contact-app/common.php</em> and edit line 5 (see given example below):</p>
<pre><span style='color:#000000; background:#ffffe8;'></span>
<span style='color:#400000; background:#ffffe8; '>define</span><span style='color:#808030; background:#ffffe8; '>(</span><span style='color:#0000e6; background:#ffffe8; '>\"WEBMASTER_EMAIL\"</span><span style='color:#808030; background:#ffffe8; '>,</span><span style='color:#000000; background:#ffffe8; '> </span><span style='color:#0000e6; background:#ffffe8; '>'yourname@yourdomain.com'</span><span style='color:#808030; background:#ffffe8; '>)</span><span style='color:#800080; background:#ffffe8; '>;</span><span style='color:#000000; background:#ffffe8; '></span></pre>

<p>PS: Once you're done, this message will not show anymore.</p>";

$showForm = false;
}
?>