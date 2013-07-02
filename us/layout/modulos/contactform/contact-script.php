<?php
/* 
-----------------------------------------------------------------------------------------------------
Make sure the 'contact-app' directory is located inside the same directory where the form script is
-----------------------------------------------------------------------------------------------------
*/

include dirname(__LINE__).'/contact-app/common.php';

if($showForm) {
?>
<link rel="stylesheet" type="text/css" href="<?php echo $urlPath; ?>contact-app/style/stylesheet.css" />
<!--[if IE]><link rel="stylesheet" type="text/css" href="contact-app/style/ie-style.css" /><![endif]-->

<div id="contact-area">

<h1>Contact Us</h1>

<div id="note"></div>

<div id="fields">

<form id="ajax-contact-form" name="ajax_contact_form" method="post" action="<?php echo $urlPath; ?>contact-app/parse.php">

<div>
<label>Name</label><input class="textbox <?php if($mandatoryFields['sender_name'] == 1) { echo 'required'; } ?>" type="text" name="sender_name" id="sender_name" value=""><br />
</div>

<div>
<label>E-Mail</label><input class="textbox <?php if($mandatoryFields['sender_email'] == 1) { echo 'required'; } ?>" type="text" name="sender_email" id="sender_email" value=""><br />
</div>

<div>
<label>Subject</label><input class="textbox <?php if($mandatoryFields['sender_subject'] == 1) { echo 'required'; } ?>" type="text" name="sender_subject" id="sender_subject" value=""><br />
</div>

<div>
<label>Message</label><textarea class="textbox <?php if($mandatoryFields['sender_message'] == 1) { echo 'required'; } ?>" name="sender_message" id="sender_message" rows="5" cols="25"></textarea><br />
</div>

<?php if(USE_CAPTCHA == 1) { ?>
<div><label id="scL">Security Code</label><div id="sec_div"><input class="textbox required" type="text" id="security_code" name="security_code" /></div><br /></div>

<div id="captcha_div"><label>&nbsp;</label><img border="0" id="captcha" src="<?php echo $urlPath; ?>contact-app/captcha/image.php" alt="">&nbsp;<a id="captcha-refresh" href="#"><img id="icon-refresh" border="0" alt="" width="16" height="16" src="<?php echo $urlPath; ?>contact-app/images/icon-refresh.png" align="bottom"></a><br /></div>
<?php } ?>

<label>&nbsp;</label><input id="submit-button" class="button" type="submit" name="submit" value="Send Message">

</form>

</div>

</div>
 
<script type="text/javascript" src="<?php echo $urlPath; ?>contact-app/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo $urlPath; ?>contact-app/js/jquery.json-1.3.min.js"></script>

<script type="text/javascript">
// URL to the script
var script_path = '<?php echo $urlPath; ?>contact-app/';
</script>
<script type="text/javascript" src="<?php echo $urlPath; ?>contact-app/js/init.js"></script>
<?php
}
?>