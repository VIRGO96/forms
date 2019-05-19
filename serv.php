<?php
 
if(isset($_POST['from']))
	{
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = $_POST['to']; 
 
    $email_subject = $_POST['subject']; ;
 
     
 
}
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['to']) ||
 
        !isset($_POST['from']) ||
 
        !isset($_POST['subject']) ||
 
        !isset($_POST['message']) ) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $To= $_POST['to']; // required
 
    $From = $_POST['from']; // required
 
    $Subject = $_POST['subject']; // required
 
    $Message = $_POST['message']; // not required
 
   
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$From)) {
 
    $error_message .= 'Your Email address not looks valid.<br />';
 
  }
   $email_to = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    
 
  if(!preg_match(  $email_to,$To)) {
 
    $error_message .= 'Your senders Email address doesnt look ok.<br />';
 
  }
 
  
 
  if(strlen($Message) < 2) {
 
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "To: ".clean_string($To)."\n";
 
    $email_message .= "From: ".clean_string($From)."\n";
 
    $email_message .= "Subject: ".clean_string($Subject)."\n";
 
    $email_message .= "Message: ".clean_string($Message)."\n";
 
   
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$From."\r\n".
 
'Reply-To: '.$From."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($To, $Subject, $Message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
Thank you for contacting us. We will be in touch with you very soon.
 
 
