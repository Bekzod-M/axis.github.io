<?php

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$title = trim($_POST['mail_title']);

$phone = trim($_POST['user_phone']);

$area = trim($_POST['area']);


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'dozkeb@bk.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'b2658922'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('dozkeb@bk.ru'); // от кого будет уходить письмо?
$mail->addAddress('devfegi@gmail.com');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML



$mail->Subject = 'Заявка с сайта "Axis"';


$nur_mes = '<br><br> <table style="width:100%"><tbody>';

if ($phone != '') {
	$nur_mes .= '
		<tr>
			<td style="padding:10px;border:#e9e9e9 1px solid"><b>Номер телефона:</b></td>
			<td style="padding:10px;border:#e9e9e9 1px solid">' . $phone . '</td>
		</tr>';
}

if ($area != '') {
	$nur_mes .= '
		<tr style="background-color:#f8f8f8">
			<td style="padding:10px;border:#e9e9e9 1px solid"><b>Площадь потолка:</b></td>
			<td style="padding:10px;border:#e9e9e9 1px solid">' . $area . '</td>
		</tr>';
}

$nur_mes .= '</tbody></table>';

$mail->Body = $title . $nur_mes;


$mail->AltBody = '';





if (!$mail->send()) {
	echo 'Error';
} else {
	header('location: ' . $_POST['thanks'] . '.html');
}
