<?php
session_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
    $mail->isSMTP();                                       
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'rayan.cit.bd@gmail.com';                     
    $mail->Password   = 'fljtrjcdwimaeymp';                               
    $mail->SMTPSecure = 'TLS';         
    $mail->Port       = 587;                                

    //Recipients
    $mail->setFrom('rayan.cit.bd@gmail.com', 'cuite');
    $mail->addAddress('tutulddc@gmail.com', 'tutul');     



    //Content
    $mail->isHTML(true);                                 
    $mail->Subject = 'client mail';
    $mail->Body    = "name: <b>$name</b> <br> email: <b>$email</b> <br> <p>$message</p>";

    $mail->send();
    header("location:../../index.php#contact");
    $_SESSION["mail_sent"] = "message sent successfully";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
