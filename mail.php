<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = $_POST['user_name'];
    $phone = $_POST['user_phone'];
    $email = $_POST['user_email'];
    $comment = $_POST['user_comment'];

    // Создаем объект PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Настройки сервера SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'elukjanskis@gmail.com'; // Ваш адрес электронной почты Gmail
        $mail->Password = 'wydecgbthkogfwwq'; // Ваш пароль приложения Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Настройки письма
        $mail->setFrom($email, $name);
        $mail->addAddress('elukjanskis@gmail.com'); // Адрес получателя
        $mail->Subject = 'Новое сообщение из формы обратной связи';
        $mail->Body = "Имя: $name\nТелефон: $phone\nEmail: $email\n\nКомментарий:\n$comment";

        // Отправляем письмо
        $mail->send();        header("Location: index.html");
        exit;
    } catch (Exception $e) {
        echo "Ошибка при отправке сообщения: {$mail->ErrorInfo}";
    }
} else {
    // Если форма не была отправлена, вы можете сделать здесь что-то еще, например, перенаправить пользователя на другую страницу
    // header("Location: другая_страница.php");
    // exit;

}
