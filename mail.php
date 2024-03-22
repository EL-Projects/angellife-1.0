<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

mb_internal_encoding("UTF-8");


$response = array('success' => false, 'message' => '');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['user_name'];
    $phone = $_POST['user_phone'];
    $email = $_POST['user_email'];
    $comment = $_POST['user_comment'];

    
    $mail = new PHPMailer(true);

    try {
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'angellife.kyiv@gmail.com'; 
        $mail->Password = 'mmyqhambhywaokhh'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Настройки письма
        $mail->CharSet = $mail::CHARSET_UTF8;
        $mail->setFrom($email, $name);
        $mail->addAddress('angellife.kyiv@gmail.com'); 
        $mail->Subject = 'angellife.kyiv.ua';
        $mail->Body = "Ім'я: $name\nТелефон: $phone\nПошта: $email\n\nКоментар:\n$comment";

        
        $mail->send();
        
        
header("Location: index.html?success=1");
exit();
        
        
    } catch (Exception $e) {
        
        error_log("Помилка під час надсилання повідомлення: {$mail->ErrorInfo}");
    }
} else {
    
}

