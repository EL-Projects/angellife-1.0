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
    $name = $_POST["contact_name"];
    $email = $_POST["contact_email"];
    $phone = $_POST["contact_phone"];
    $message = $_POST["contact_comment"];

    // Create a new PHPMailer instance
    $mail = new PHPMailer();

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'elukjanskis@gmail.com'; // Your SMTP username
    $mail->Password = 'hulm dame dnhr zurx'; // Your SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

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