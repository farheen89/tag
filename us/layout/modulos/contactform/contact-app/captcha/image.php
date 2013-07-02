<?php
include_once '../headers.php';
include_once '../common.php';
include_once 'class.captcha.php';

$captcha = new Captcha();

$pathToCaptchaFolder = dirname(__FILE__).'/'; 

$captcha->charsNumber = 5;
$captcha->stringType = 4;
$captcha->fontSize = 14;
$catpcha->borderColor = '239, 239, 239';
$captcha->ttFont = $pathToCaptchaFolder.'verdana.ttf';

$captcha->showImage(106, 31);
?>