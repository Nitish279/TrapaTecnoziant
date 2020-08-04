<?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);




    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';

    // Load Composer's autoloader
//require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.sendgrid.net';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'TradingGyan';                     // SMTP username
    $mail->Password   = 'bigcow@123';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('info@tradinggyan.com');
    $mail->addAddress('paurush.ankit@gmail.com');     // Add a recipient
    $mail->addAddress('paurushankit5@gmail.com');     // Add a recipient
    //$mail->addReplyTo('info@it-expert.co.in');

    // Attachments
    //$mail->addAttachment($_FILES['userResume']['tmp_name']);         // Add attachments

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'New Resumed Posted from '.$_REQUEST['userName'];
    $mail->Body    = "<ul>
                        <li>Name: <b>".$_REQUEST['userName']."</b></li>
                        <li>Email: <b>".$_REQUEST['userEmail']."</b></li>
                        <li>Phone: <b>".$_REQUEST['userPhone']."</b></li>
                    </ul>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header('Location: index.html?success=true');

    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: ";
}
?>