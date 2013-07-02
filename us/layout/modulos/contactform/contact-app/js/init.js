/* 
Author: Gabriel Comarita

Author's Website: http://www.bitrepository.com/

* Keep this notice intact for legal use *
*/

// Ensure that JQuery won't conflict with other libraries

var $j = jQuery.noConflict();

/* 
--------------
CONFIGURATION
--------------
*/

// URL to the PHP file that processes the sent data (example: http://www.domain.com/contact-app/parse.php)
var path_to_php_process_file = script_path + 'parse.php',

// URL to the images folder
path_to_images = script_path + 'images/',

// Path to the JavaScript folder (where all the .js are located)
path_to_js = script_path + 'js/';

// Minimum length of characters the user should type in the message
var min_message_chars = 15;

// Show the field errors with italics
var show_errors_with_italics = true;

/* Set to 'true' to enable the real time validator, 'false' to disable it  */
var js_realtime_validator = true;

/* Highlight Field Zone when Focus */
var highlight_field_zone = true;

/* 
----------------------
Errors, Notifications
----------------------
*/

var sender_name_e = 'Fill your name',

    sender_email_none_e = 'Fill an e-mail address',
    sender_email_e = 'Fill a valid e-mail address',

    sender_subject_e = 'Fill a subject',

    sender_message_e = 'Your message should have at least '+ min_message_chars +' characters.',

    security_code_e = 'Please enter the security code',
    security_code_i_e = 'The security code is incorrect.',

    correct_errors_e = 'Please correct the errors and re-submit the form!',
    mail_cannot_be_sent_e = 'The mail cannot be sent due to an internal error. Please retry later!',

    message_sent_s = 'The message has been successfully sent. Thank you for writting to us!';


// Important for JS validation
var total_required_inputs = $j(":input.required").length; /* (usually name, email, subject, message & security code) */

// Are we using the basic form with no captcha? Then decrease the number of total required inputs
if(($j("#security_code").length == 0)) {
total_required_inputs--;
}

/* Selectors */
var sender_name = 'sender_name';
var sender_email = 'sender_email';
var sender_subject = 'sender_subject';
var sender_message = 'sender_message';
var security_code = 'security_code';

$j(function() { // When DOM is ready

    // Preload Icons
	// This way they will show instantly without waiting for the browser to load them (for instance the 'ajax loading spinner')
	
	img1 = new Image(18, 15);
    img1.src = path_to_images + 'ajax-loader.gif';
    
	img2 = new Image(22, 22);
    img2.src = path_to_images + 'icon-dialog-error.png';
	
	img3 = new Image(22, 22);
    img3.src = path_to_images + 'icon-button-ok.png';

	/*
    --------------------
    RealTime Validation
    --------------------
    */
	
    if(js_realtime_validator) {
    $j.getScript(path_to_js + 'realtime.validator.js'); // Loads, an executes a local JavaScript file using an HTTP Request
	} 
	
    /*
    -------------------------------------------------
    Is the form (ID: 'ajax-contact-form') submitted?
    -------------------------------------------------
    */



    $j('#ajax-contact-form').submit(function() {

    if(js_realtime_validator) {

       checkName();
       checkEmail();
       checkSubject();
       checkMessage();
       checkSecurityCode();
       checkStatus();


       if($j(".ok").length < total_required_inputs) return false;

    }

    var formData = $j(this).serialize(); // Serializes a set of input elements into a string data (example: first_name=John&last_name=Doe)


	// Hide 'Submit' Button
    $j('#submit').hide();

    // Show GIF Spinning Rotator
    $j('#ajax-loading').show();
	
    $j.ajax({
      type: "POST",
      url: path_to_php_process_file,
      data: formData,
      success: function(response) {

       $j("#note").ajaxComplete(function(event, request, settings) {

      var status = $j.evalJSON(response).status;


       if(status == 0) { // Message sent
         var result = '<div class="notification_ok">'+ message_sent_s +'</div>';
         $j("#fields").hide();
       }
       else if(status == 1) { // Errors found?

	          var result = '<div class="notification_error">'+ correct_errors_e + '<br /><br />';
			  
			  if(show_errors_with_italics) { result += '<em>'; }

			  // First, remove all errors to avoid adding the same errors twice in the page
			  // If any errors are found, the script will change the 'class' value(s) (error)

		      $j('label.error').remove();

			  if($j.evalJSON(response).sender_name) {
			  $j('#' + sender_name).addClass('error').removeClass('ok');
			  
			  result += sender_name_e +'<br />';
              } else {
              $j('#' + sender_name).addClass('ok').removeClass('error');
              }			
			  
			  // E-Mail Validator

              if($j.evalJSON(response).sender_email) {
			  $j('#' + sender_email).addClass('error').removeClass('ok');
			  
			  result += sender_email_e +'<br />';

              } else if ($j.evalJSON(response).sender_email_none) {
			  $j('#' + sender_email).addClass('error').removeClass('ok');
			  result += sender_email_none_e +'<br />';
              } else {
              $j('#' + sender_email).addClass('ok').removeClass('error');
              }			  
 
			  // Subject

			  if($j.evalJSON(response).sender_subject) {
			  $j('#' + sender_subject).addClass('error').removeClass('ok');
			  
			  result += sender_subject_e +'<br />';
              } else {
              $j('#' + sender_subject).addClass('ok').removeClass('error');
              }

			  // Message
			  
              if($j.evalJSON(response).sender_message) {
			  $j('#' + sender_message).addClass('error').removeClass('ok');
			  
			  result += sender_message_e +'<br />';
              } else {
              $j('#' + sender_message).addClass('ok').removeClass('error');
              }

			  if($j.evalJSON(response).security_code == 1) {
			  $j('#' + security_code).addClass('error').removeClass('ok');
			  
              result += security_code_e +'<br />';

			  } else if($j.evalJSON(response).security_code == 2) {
			  $j('#' + security_code).addClass('error').removeClass('ok');
			  
			  result += security_code_i_e +'<br />';

              } else {
              $j('#sec_div').html('<img class="ok" id="verified" src="'+ script_path + 'images/icon-tick-circle-frame.png" width="16" height="16">&nbsp;<font color="green">Verified</font>');
			  $j('#captcha_div').remove();
              $j('#sc_error').remove();

              }

			  if(show_errors_with_italics) { result += '</em>'; }
			  
			  result += '</div>';

			  // Mail cannot be sent?
       } else if(status == 2) {
	         var result = '<div class="notification_error">'+ mail_cannot_be_sent_e +'</div>';
             $j("#fields").hide();
	   }

              // Hide GIF Spinning Rotator
	          $j('#ajax-loading').hide();
	         
	          // Show 'Submit' Button
	          $j('#submit').show();

			  // Could be notification error or a notification that the form has been submitted successfully / Show the notification with a "fade in" effect
	          $j(this).html(result).slideDown();

});

}

});

return false; // prevent the form from being submitted in the classical way

        });

});

function new_captcha()
{
var c_currentTime = new Date();
var c_miliseconds = c_currentTime.getTime();

document.getElementById('captcha').src = 'contact-app/captcha/image.php?x='+ c_miliseconds;

return false;
}

$j('#captcha-refresh').bind('click', new_captcha);