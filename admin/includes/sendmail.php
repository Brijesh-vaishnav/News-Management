<?php
    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendmail($email, $v_code,$usertype)
{

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function

    //Load Composer's autoloader
    require("Mail/PHPMailer.php");
    require("Mail/Exception.php");
    require("Mail/SMTP.php");
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // $mail->SMTPDebug = 2;        //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'shrimaliparth1@gmail.com';                     //SMTP username
        $mail->Password   = 'rtlqncxsnkrdbolq';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('shrimaliparth1@gmail.com', 'News Portal');
        $mail->addAddress($email);     //Add a recipient
       

        //Attachments
      //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'News Portal Email Verification';
        $mail->Body    = "Thank you for registering News Portal. Use code <b>$v_code</b> for verification.";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo "<script>document.location='./verify.php?email=$email&usertype=$usertype'</script>";


    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>