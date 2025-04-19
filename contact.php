<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_DEPRECATED);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

$name    = $_POST['name'];
$email   = $_POST['email'];
$message = $_POST['message'];
$FromEmail = "ashishsavaliya106@gmail.com";

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username = $FromEmail;
    $mail->Password = "ashish@78";
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom($email, $name);
    $mail->addAddress('ashishsavaliya106@gmail.com');
    $mail->addReplyTo($email, $name);

    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Message';
    $mail->Body    = "
        <h3>Contact Form Message</h3>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Message:</strong><br>$message</p>
    ";

    $mail->send();
    echo "<h3 style='text-align:center; color:green;'>Message sent successfully!</h3>";
header("Location: index.html?status=success");
exit;

} catch (Exception $e) {
    echo "<h3 style='text-align:center; color:red;'>Mailer Error: {$mail->ErrorInfo}</h3>";
}
?>
