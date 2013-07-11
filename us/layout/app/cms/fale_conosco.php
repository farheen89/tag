<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<link rel="stylesheet" type="text/css" href="http://www.blue-broker.com.br/core/app/contactform/css/contactform.css" media="screen" />
<script language="JavaScript" src="http://www.blue-broker.com.br/core/app/contactform/scripts/gen_validatorv31.js" type="text/javascript"></script>

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
        $errors .= "\n Nome e Email são obrigatórios. ";
    }
    if(IsInjected($visitor_email))
    {
        $errors .= "\n Email inv&aacute;lido!";
    }
    if(empty($_SESSION['6_letters_code'] ) ||
        strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
    {
        //Note: the captcha code is compared case insensitively.
        //if you want case sensitive match, update the check above to
        // strcmp()
        $errors .= "O código inserido est&aacute; errado!";
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

        echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=http://blue-broker.com.br/us/obrigado.php'>";
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
<div id="emailformtitle">Fale Conosco</div>
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
            Nome:</br>
            Email:</br>
            Mensagem:</br>
        </div>
        <div id="labels_space">&nbsp;</div>
        <div id="formfields">
            <input type="text" name="name" size="45" value='<?php echo htmlentities($name) ?>'></br>
            <input type="text" name="email" size="45" value='<?php echo htmlentities($visitor_email) ?>'></br>
            <textarea name="message" rows=10 cols=45><?php echo htmlentities($user_message) ?></textarea></br>
        </div>
        <div id="captchatext">Insira o c&oacute;digo aqui :
            <input id="6_letters_code" name="6_letters_code" type="text"></div><div id="captcha"><img src="http://blue-broker.com.br/core/modulos/contactform/captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ></div>
        <div id="advise">N&atilde;o consegue ler ? Clique <a href='javascript: refreshCaptcha();'><font color="#FF000" size="4" face="calibri"><strong>aqui</strong></font></a> para mudar..</div>
        <div id='button_submit'><input type="submit" value="Enviar" name='submit'></div>
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
    frmvalidator.addValidation("name","req","Por favor insira um nome.");
    frmvalidator.addValidation("email","req","Por favor insira um email.");
    frmvalidator.addValidation("email","email","Por favor insira um email válido.");
</script>
<script language='JavaScript' type='text/javascript'>
    function refreshCaptcha()
    {
        var img = document.images['captchaimg'];
        img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
    }
</script>