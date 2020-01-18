<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'connectdatabase.php';

if(isset($_POST["email"])){
    $mail = new PHPMailer(true);
  

    $emailto = $_POST["email"];
    $code = uniqid(true);
    $query = mysqli_query($con, " INSERT INTO resetPasswords(code,email) VALUES ('$code','$emailto') ");
    if(!$query){
        exit("Error");
    }

    try {
        //Server settings
        $mail->SMTPDebug;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'fansfindergames@gmail.com';                     // SMTP username
        $mail->Password   = 'teamleader6';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('fansfindergames@gmail.com', 'FanFinder');
        $mail->addAddress("$emailto");     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('no-reply@fanfinder.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        // Content
        $url = "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"])."/resetpage.php?code=$code";
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Reset Password Link';
        $mail->Body    = "<h3> Reset Your Password </h3>
                             <b>Click</b><a href='$url'> this link</a> to do so";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    

        $mail->send();
        echo '<h3 style="background-color:white;color:blue;text-align:center;">Password Reset Link has been sent to email</h3>';
       
       
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
   
}


// Instantiation and passing `true` enables exceptions
    
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Forget Password</title>
        <link rel="stylesheet" href="forgetpass.css">
        <link rel="stylesheet" href="../css/main.css">
    </head>

    <body>
            <div class="limiter">
                    <div class="container-login100" style="background-color: rgb(255, 255, 255);">
                        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                            <form method="POST" class="forgot-form">
                            
                                    <span class="login100-form-title p-b-53">
                                        E-mail
                                    </span>
                                    <div class="wrap-input100 validate-input">
                                        <input class="input100" type="email" name="email" value="">
                                    </div>
                                    
                                    
                                        <input class="reset-button" type="submit" value="Reset Password" name="submit">
                                    
                                 
                            </form>
                        </div>
                    </div>
            </div>
    </body>
</html>