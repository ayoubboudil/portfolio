<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    $fullname= $_POST["fullname"];
    $email= $_POST["email"];
    $number=$_POST["number"];
    $subject=$_POST["Subject"];
    $message=$_POST["message"];

    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ayoubboudil21@gmail.com';                     //SMTP username
    $mail->Password   = 'itqg aide bjoq wked';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Attachments
    //$mail->addAttachment('125.jpg');         //Add attachments
   


    //recipiants

    $mail->setFrom( $email, $fullname);
    $mail->addAddress('ayoubboudil21@gmail.com');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject =   $subject;
    $mail->Body    =   ' <b>'.$fullname.'</b> ' .'<br>' .$email .'<br> ' .$number .'<br>' . $subject .'<br> ' .$message ;
    $mail->AltBody =    $message;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}