<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';



 function sendEmail($email,$subject, $messagebody)
{

// potrebne zmenit email adresu , subject , message body a vyskusat ,, pozor na pridavanie premennych do uvodzoviek
//  nastavit adresu  www.hotspot attd verification hash code atd

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = 1;                      // Enable verbose debug output
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'tls';// Enable SMTP authentication
    $mail->Username   = 'jakubshoop@gmail.com';                     // SMTP username
    $mail->Password   = 'iamrabbit';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('from@example.com', 'Library');

    $mail->addAddress($email);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $messagebody;
    $mail->AltBody = $messagebody;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}



function sendContactEmail($email,$name,$message)
{

// potrebne zmenit email adresu , subject , message body a vyskusat ,, pozor na pridavanie premennych do uvodzoviek
//  nastavit adresu  www.hotspot attd verification hash code atd

// Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        
        //$mail->SMTPDebug = 1;                      // Enable verbose debug output
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = 'tls';// Enable SMTP authentication
        $mail->Username   = 'jakubshoop@gmail.com';                     // SMTP username
        $mail->Password   = 'iamrabbit';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                     // TCP port to connect to

        //Recipients
        $mail->setFrom($email, $name);

        $mail->addAddress("jakub.tomas@akademiasovy.sk");     // Add a recipient
        $mail->addReplyTo($email,$name);




        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Email from library";
        $mail->Body    =$message;
        $mail->AltBody = $message;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

