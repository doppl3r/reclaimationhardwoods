<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Elements-Global Mailer</title>
</head>
<body>
<?php
require 'class.phpmailer.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
//$mail->isSendmail();
//Set who the message is to be sent from
//$mail->setFrom('support@climatec.com', 'Climatec');
$mail->setFrom($_REQUEST['email'], $_REQUEST['name']);
//Set who the message is to be sent to
//$mail->addAddress('info@elements-global.com');
$mail->addAddress('deben3@gmail.com');
//$mail->addAddress($_REQUEST['email'], $_REQUEST['name']);
//Set the subject line
$mail->Subject = 'Elements-Global Contact Submission';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$message =  '<div style="border: 1px dashed #00a8d8; border-radius: 5px; padding: 0px 24px 24px;">'.
            '<p style="color: #00a8d8;"><strong>Customer:</strong> '.$_REQUEST['name'].'</p>'.
            '<p style="color: #00a8d8;"><strong>Company Name:</strong> '.$_REQUEST['company'].'</p>'.
            '<p style="color: #00a8d8;"><strong>Email Address:</strong> '.$_REQUEST['email'].'</p>'.
            '<p style="color: #00a8d8;"><strong>Phone Number:</strong> '.$_REQUEST['phone'].'</p>'.
            '<p style="color: #00a8d8;"><strong>Message:</strong> '.$_REQUEST['message'].'</p>'.
            '</div>';
$mail->msgHTML($message);
//$mail->AltBody = 'Unique wood color code: '+$_REQUEST['index'];;
//Attach an image file
//$mail->AddAttachment($_FILES['uploaded_file']['tmp_name'],$_FILES['uploaded_file']['name']);

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    //header('Location:contactus-thankyou.php');
    //header('Location: /index.html');
    echo '<script>window.location = "success.html";</script>';
}
?>
</body>
</html>
