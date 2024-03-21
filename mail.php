<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

mb_internal_encoding("UTF-8");

// Создаем ассоциативный массив для ответа
$response = array('success' => false, 'message' => '');

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
        $mail->Username = 'angellife.kyiv@gmail.com'; // Ваш адрес электронной почты Gmail
        $mail->Password = 'mmyqhambhywaokhh'; // Ваш пароль приложения Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Настройки письма
        $mail->CharSet = $mail::CHARSET_UTF8;
        $mail->setFrom($email, $name);
        $mail->addAddress('angellife.kyiv@gmail.com'); // Адрес получателя
        $mail->Subject = 'angellife.kyiv.ua';
        $mail->Body = "Ім'я: $name\nТелефон: $phone\nПошта: $email\n\nКоментар:\n$comment";

        // Отправляем письмо
        $mail->send();
        
        // echo '<p>Почта успешно отправлена!</p>';
header("Location: index.html?success=1");
exit();
        // Ждем 3 секунды и перенаправляем пользователя на главную страницу
        
    } catch (Exception $e) {
        // Записываем сообщение об ошибке в файл журнала
        error_log("Ошибка при отправке сообщения: {$mail->ErrorInfo}");

        // Выводим сообщение об ошибке на экран
        echo "Ошибка при отправке сообщения: {$mail->ErrorInfo}";
    }
} else {
    // Если форма не была отправлена, вы можете сделать здесь что-то еще, например, перенаправить пользователя на другую страницу
    // header("Location: другая_страница.php");
    // exit;
}

