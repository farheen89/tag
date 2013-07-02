/* [RealTime Validation] */

//if($j('#' + sender_name).val() != '' && $j('#' + sender_email).val() != '' && $j('#' + sender_subject).val() != '' && $j('#' + sender_message).val() != '' && $j('#' + security_code).val() != ''))

/*
-----------------
Sender Name
-----------------
*/

var checkName = function() {

if($j(":input[name='"+ sender_name +"'].required").length) { // Required?

$j('#sn_error').remove();

if($j('#' + sender_name).val() == '') {
$j('#' + sender_name).addClass('error').removeClass('ok').after('<label id="sn_error" class="error">'+ sender_name_e +'</label>');
checkStatus();

} else {

$j('#' + sender_name).addClass('ok').removeClass('error');
}

}

};

$j('#' + sender_name).bind('change', checkName);
$j('#' + sender_name).bind('blur', function() { if($j('#' + sender_name).val()) { checkName(); } });

/*
-----------------
Sender E-Mail 
-----------------
*/

var checkEmail = function() {
	
if($j(":input[name='"+ sender_email +"'].required").length) { // Required?

var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i

$j('#se_error, #sen_error').remove();

if($j('#' + sender_email).val() == '') {
$j('#' + sender_email).addClass('error').removeClass('ok').after('<label id="sen_error" class="error">'+ sender_email_none_e +'</label>');
checkStatus();

} else if(!filter.test($j('#' + sender_email).val())) {

$j('#' + sender_email).addClass('error').removeClass('ok').after('<label id="se_error" class="error">'+ sender_email_e +'</label>');
checkStatus();

} else {

$j('#' + sender_email).addClass('ok').removeClass('error');

}

}

};

$j('#' + sender_email).bind('change', checkEmail);
$j('#' + sender_email).bind('blur', function() { if($j('#' + sender_email).val()) { checkEmail(); } });

/*
-----------------
Sender Subject
-----------------
*/



var checkSubject = function() {

if($j(":input[name='"+ sender_subject +"'].required").length) { // Required?

$j('#ss_error').remove();

if($j('#' + sender_subject).val() == '') {
$j('#' + sender_subject).addClass('error').removeClass('ok').after('<label id="ss_error" class="error">'+ sender_subject_e +'</label>');
checkStatus();

} else {

$j('#' + sender_subject).addClass('ok').removeClass('error');

}

}

};

$j('#' + sender_subject).bind('change', checkSubject);
$j('#' + sender_subject).bind('blur', function() { if($j('#' + sender_subject).val()) { checkSubject(); } });

/*
-----------------
Sender Message
-----------------
*/

var checkMessage = function() {
	
if($j(":input[name='"+ sender_message +"'].required").length) { // Required?

$j('#sm_error').remove();

if ($j('#' + sender_message).val().length < min_message_chars) { // if the message's legth is less than 15 characters
$j('#' + sender_message).addClass('error').removeClass('ok').after('<label id="sm_error" class="error">'+ sender_message_e +'</label>');

$j('#' + sender_message).bind('keypress', checkMessage);

checkStatus();

} else {

$j('#' + sender_message).addClass('ok').removeClass('error');

checkStatus();

}

}

};

$j('#' + sender_message).bind('change', checkMessage);
$j('#' + sender_message).bind('blur', function() { if($j('#' + sender_message).val()) { checkMessage(); } });

/*
-----------------
Security Code
-----------------
*/

var checkSecurityCode = function() {

//if($j('#' + security_code).val().length == 5) {

if ($j('#captcha_div').is(':visible')) {

//alert($j("#sc_error.error").length);

//if($j("#sc_error").length == 0) {
	$j('#sc_error').remove();
	//}

if($j('#' + security_code).val() == '') {

$j('#' + security_code).addClass('error').removeClass('ok');
$j('#sec_div').after('<label id="sc_error" class="error">'+ security_code_e +'</label>');

checkStatus();

} else {

var c_currentTime = new Date();
var c_miliseconds = c_currentTime.getTime();

var validCode = $j('#' + security_code).val();

/* [Start] AJAX Call */

$j.ajax({ url: script_path + 'verify-code.php?x='+ c_miliseconds, 
	     data: "security_code="+ validCode,
	     type: 'post', 
	     datatype: 'html', 
	     success: function(outData) { 

	      	          if(outData != 1) {

						  

	      	            if($j("#sc_error.error").length == 0) {
	      	                $j('#' + security_code).addClass('error').removeClass('ok');
	      	                $j('#sec_div').after('<label id="sc_error" class="error">'+ security_code_i_e +'</label>');

							checkStatus();

						
	      	            }

	      	          } else {

						  //$j('#sc_error').remove();

                      $j('#' + security_code).remove();
                      $j('#sec_div').css({ margin: '8px 0 0 0' }).html('<img class="ok" id="verified" src="'+ script_path + 'images/icon-tick-circle-frame.png" width="16" height="16">&nbsp;<font color="green">Verified</font>').fadeIn('slow', function() { $j('#captcha_div').hide(); $j('#submit-button').before('<input type="hidden" name="security_code" id="security_code" value="'+ validCode +'" />'); });
					  
					  //$j('div').removeClass("highlighted");

					  }
					  
		              }, 

	     error: function(errorMsg) { alert('Error occured: ' + errorMsg); }});

/* [End] AJAX Call */

}

}

//}

};

var checkSecurityCodeLive = function() {

var c_currentTime = new Date();
var c_miliseconds = c_currentTime.getTime();

var validCode = $j('#' + security_code).val();

/* [Start] AJAX Call */

$j.ajax({ url: script_path + 'verify-code.php?x='+ c_miliseconds, 
	     data: "security_code="+ validCode,
	     type: 'post', 
	     datatype: 'html', 
	     success: function(outData) { 

	      	          if(outData == 1) {

					  $j('#sc_error').remove();

                      $j('#' + security_code).remove();
                      $j('#sec_div').css({ margin: '8px 0 0 0' }).html('<img class="ok" id="verified" src="'+ script_path + 'images/icon-tick-circle-frame.png" width="16" height="16">&nbsp;<font color="green">Verified</font>').fadeIn('slow', function() { $j('#captcha_div').hide(); $j('#submit-button').before('<input type="hidden" name="security_code" id="security_code" value="'+ validCode +'" />'); });
					  
					  $j('div').removeClass("highlighted");

					  checkStatus();

					  }
					  
		              }, 

	     error: function(errorMsg) { alert('Error occured: ' + errorMsg); }});

/* [End] AJAX Call */

};

//$j('#sc_error').remove();

$j('#' + security_code).bind('change', checkSecurityCode);
$j('#' + security_code).bind('blur', function() { if($j('#' + security_code).val()) { checkSecurityCode(); } });

$j('#' + security_code).keyup(checkSecurityCodeLive);

$j(':input.required').bind('change blur keyup', checkStatus);

function checkStatus() {

if(show_errors_with_italics === true) {
$j("label[id$='_error']").addClass('styled');
}

if($j("label.error").length > 0) { 
	// Show the top notice error
	$j('#note').html('<div class="notification_error">'+ correct_errors_e +'</div>').slideDown('slow');
}

if($j("label.error").length == 0) { 
	$j('#note').slideUp('slow'); // Hide the top notice error using a 'slide' effect (if necessary)
}

return true;

}

if(highlight_field_zone) {

    var fields = ["sender_name", "sender_email", "sender_subject", "sender_message", "security_code"];

    $j.each(fields, function() {

	    if(this == 'security_code') {
	
	      $j('#' + this) .focus(function() { $j(this).parent('div').parent('div').addClass("highlighted"); })
				         .blur(function() { $j(this).parent('div').parent('div').removeClass("highlighted"); });
        } else {
          $j('#' + this).focus(function() { $j(this).closest('div').addClass("highlighted"); })
				        .blur(function() { $j(this).closest('div').removeClass("highlighted"); });
	    }

    });

}