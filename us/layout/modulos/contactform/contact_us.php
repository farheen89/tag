<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<link rel="stylesheet" type="text/css" href="http://www.blue-broker.com.br/core/modulos/contactform/css/contactform.css" media="screen" />
<script language="JavaScript" src="http://www.blue-broker.com.br/core/modulos/contactform/scripts/gen_validatorv31.js" type="text/javascript"></script>

<?php
@session_start();
$your_email ='contact@sportingtag.com';// <<=== update to your email address

$errors = '';
$name = '';
$visitor_email = '';
$user_message = '';

if(isset($_POST['submit']))
{
	
	$name = $_POST['name'];
	$visitor_email = $_POST['email'];
	$user_message = $_POST['message'];

	if(empty($name)||empty($visitor_email))
	{
		$errors .= "\n Name and Email are required fields. ";
	}
	if(IsInjected($visitor_email))
	{
		$errors .= "\n Bad email value!";
	}
	if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$errors .= "The captcha code does not match!";
	}
	
	if(empty($errors))
	{
		//send the email
		$to = $your_email;
		$subject="New form submission";
		$from = $your_email;
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		
		$body = "A user  $name submitted the contact form:\n".
		"Name: $name\n".
		"Email: $visitor_email \n".
		"Message: \n ".
		"$user_message\n".
		"IP: $ip\n";	
		
		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $visitor_email \r\n";
		
		mail($to, $subject, $body,$headers);

        echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=http://blue-broker.com.br/us/thank_you.php'>";
	}
}

function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>
<div id="emailformtitle">Contact Us</div>
<div id="error_space">&nbsp;</div>
<div id="errorfield">
<div class='err'><?php if(!empty($errors)){
    echo $errors;
}
?></div>
<div id='contact_form_name_errorloc' class='err'></div>
<div id='contact_form_email_errorloc' class='err'></div>
</div>

<div id="error_space">&nbsp;</div>

<div id="contactform">
<form method="POST" name="contact_form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
<div id="labels">
Name:</br>
Email:</br>
Message:</br>
</div>
<div id="labels_space">&nbsp;</div>
<div id="formfields">
<input type="text" name="name" size="45" value='<?php echo htmlentities($name) ?>'></br>
<input type="text" name="email" size="45" value='<?php echo htmlentities($visitor_email) ?>'></br>
<textarea name="message" rows=10 cols=45><?php echo htmlentities($user_message) ?></textarea></br>
</div>
<div id="captchatext">Enter the code here :
<input id="6_letters_code" name="6_letters_code" type="text"></div><div id="captcha"><img src="http://blue-broker.com.br/core/modulos/contactform/captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ></div>
<div id="advise">Can't read the image? Click <a href='javascript: refreshCaptcha();'><font color="#FF000" size="4" face="calibri"><strong>here</strong></font></a> to refresh</div>
<div id='button_submit'><input type="submit" value="Submit" name='submit'></div>
</form>
</div>


<script language="JavaScript">
// Code for validating the form
// Visit http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
// for details
var frmvalidator  = new Validator("contact_form");
//remove the following two lines if you like error message box popups
frmvalidator.EnableOnPageErrorDisplay();
frmvalidator.EnableMsgsTogether();
frmvalidator.addValidation("name","req","Please provide your name.");
frmvalidator.addValidation("email","req","Please provide your email.");
frmvalidator.addValidation("email","email","Please enter a valid email address.");
</script>
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>