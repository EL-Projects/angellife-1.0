<?php
// Include PHPMailer autoload file
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["user-name"];
    $email = $_POST["user-email"];
    $phone = $_POST["user-phone"];
    $message = $_POST["user-comment"];

    // Create a new PHPMailer instance
    $mail = new PHPMailer();

    // SMTP configuration



    $phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = 'fa66402eafc8f4';
$phpmailer->Password = '********83e6';
    // $mail->isSMTP();
    // $mail->Host = 'smtp.example.com'; // Your SMTP server
    // $mail->SMTPAuth = true;
    // $mail->Username = 'your_username@example.com'; // Your SMTP username
    // $mail->Password = 'your_password'; // Your SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    // $mail->Port = 587; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    // Sender and recipient settings
    $mail->setFrom('your_username@example.com', 'Your Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name');

    // Email subject and body
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body    = "Name: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message";

    // Send email
    if ($mail->send()) {
        echo "Your message has been sent successfully.";
    } else {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
} else {
    // Redirect back to the form page if accessed directly
    header("Location: contact_form.html");
    exit;
}
?>