<?php
if(isset($_POST['email'])) {
 
    // $email_to = "robin@dealerproseries.com, tom@dealerproseries.com, brentkwebdev@gmail.com"; // input client email here
    $email_to = "brentkwebdev@gmail.com";
    $email_subject = "New message for ART from AutoRenu website";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $phone_number = $_POST['phone']; // required
    $company_name = $_POST['company-name']; // not required to have a value
    $message = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The e-mail address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The name you entered does not appear to be valid.<br />';
  }

    $phone_exp = '/^\D?[0-9]{3}\D?\D?+[0-9]{3}+\D?+[0-9]{4}$/';

  if(!preg_match($phone_exp, $phone_number)) {
    $error_message .= 'The phone number you entered is not valid.<br />';
  }
 
  if(strlen($message) < 2) {
    $error_message .= 'The message you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Phone:".clean_string($phone_number)."\n";
    $email_message .= "Dealership Group: ".clean_string($company_name)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
header('Location: index.html');
?>
 
<head>
<title>AutoRenu</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div>
        <h1>Thank you for contacting us! We will be in touch with you shortly.</h1>
        <a href="index.html"><button btn-primary>Return Home</button></a>
    </div>
</body>
 
<?php
 
}
?>