<?php

header('Content-Type: text/html; charset=utf-8');

require_once('phpmailer/PHPMailerAutoload.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST ['text'];


    $mail = new PHPMailer;
    $mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.janexxx1337.ru';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'janexxx@janexxx1337.ru';                 // Наш логин
    $mail->Password = '&__Pegas71717142';                           // Наш пароль от ящика
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom('janexxx@janexxx1337.ru', 'Hook');   // От кого письмо
    $mail->addAddress('janexxx@janexxx1337.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Данные';
    $mail->Body = '
		Пользователь оставил данные <br> 
	Имя: ' . $name . ' <br>
	Номер телефона: ' . $phone . '<br>
    Текст: ' . $message . '<br>
	E-mail: ' . $email . '';
   

    if (!$mail->send()) {
        echo "Ошибка отправки";
    } else {
        echo "Сообщение отправлено";
    }
} else {
    echo "Это GET запрос, ничего не отправляется";
}


?>