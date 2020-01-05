<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

function sendEmail($email,$subject, $hash)
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
        $mail->Host       = 'smtp.azet.sk';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = 'ssl';// Enable SMTP authentication
        $mail->Username   = 'zajao@azet.sk';                     // SMTP username
        $mail->Password   = 'creative159753';                               // SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to
        // TCP port to connect to
        // TCP port to connect to

        //Recipients
        $mail->setFrom('zajao@azet.sk');

        $mail->addAddress($email);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject =" Account verification";
        $mail->Body    = ' Hello ' . $email . '
                        Thank you for signing up.
                        
                        Please click this link to activate your account
                        
                         
                        www.sovy.unaux.com/verification.php?email=' . $email . '&hash=' . $hash;   // change via the web address

//http://sovy.unaux.com/

        // $mail->AltBody = "to som zvedavy ci to pojde";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}


function sendEmailBookIsReady($email,$subject, $messagebody)
{


// Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = 1;                      // Enable verbose debug output
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.azet.sk';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = 'ssl';// Enable SMTP authentication
        $mail->Username   = 'zajao@azet.sk';                     // SMTP username
        $mail->Password   = 'creative159753';                               // SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to
        // TCP port to connect to
        // TCP port to connect to

        //Recipients
        $mail->setFrom('zajao@azet.sk');

        $mail->addAddress($email);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject =$subject;
        $mail->Body    = $messagebody;
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}





function sendContactEmail($email,$name,$message)
{


// Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {

        //$mail->SMTPDebug = 1;                      // Enable verbose debug output
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.azet.sk';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = 'ssl';// Enable SMTP authentication
        $mail->Username   = 'zajao@azet.sk';                     // SMTP username
        $mail->Password   = 'creative159753';                               // SMTP password
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                     // TCP port to connect to

        //Recipients
        $mail->setFrom("zajao@azet.sk");

        $mail->addAddress("zajao@azet.sk");     // Add a recipient
        //$mail->addReplyTo($email,$name);




        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Email from library";
        $mail->Body    = '<h3>Hello This email sent</h3>  ' . $email . '
        ' .  '<br>' .  '                Message:
        ' .  $message . '                        
        ' .  '<br>' . '   ';





        $mail->AltBody = "This is message ";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

