<?php
include 'headers.php';

if(isSet($_POST['security_code'])) {

$security_code = trim($_POST['security_code']);
$to_check = md5($security_code);

if($to_check == $_SESSION['captcha_security_code'])  {
echo 1; // Valid Code
}

}
?>