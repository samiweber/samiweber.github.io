<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "ERROR. You need to submit the form.";
}

$field_name = $_POST['name'];
$field_email = $_POST['email'];
$field_subject = $_POST['subject'];
$field_message = $_POST['comment'];

//Validate first
/*if(empty($field_name)||empty($field_email)) 
{?>
	<script language="javascript" type="text/javascript">
		alert('Name and Email are required.');
		window.location = 'index.html#contact';
	</script>
<?php
}

if(IsInjected($field_email))
{?>
	<script language="javascript" type="text/javascript">
		alert('Not a valid email value.');
		window.location = 'index.html#contact';
	</script>
<?php
}*/

$mail_to = 'sweber30@my.wctc.edu';
$subject = $field_subject . ' from ' . $field_name;

$body_message = 'From: '.$field_name."\n";
$body_message .= 'Email: '.$field_email."\n";
$body_message .= 'Subject: '.$field_subject."\n";
$body_message .= 'Message: '.$field_message;

$headers = 'From: '.$field_email."\r\n";
$headers .= 'Reply-To: '.$field_email."\r\n";

$mail_status = mail($mail_to, $subject, $body_message, $headers);

if ($mail_status) { ?>
	<script language="javascript" type="text/javascript">
		alert('Thanks! Your message has been sent.');
		window.location = 'index.html#contact';
	</script>
<?php
}
else { ?>
	<script language="javascript" type="text/javascript">
		alert('Message failed to send. Try again or send me an email directly at sweber30@my.wctc.edu');
		window.location = 'index.html#contact';
	</script>
<?php
}

// Function to validate against any email injection attempts
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