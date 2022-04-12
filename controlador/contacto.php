<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../modelo/conexion.php';
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';



$mail = new PHPMailer(true);
$intentos = 0;
$email = $_POST['email'];
$name = $_POST['name'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$DB = new DB();
$sql = "INSERT INTO contacto (id,nombre, email, titulo, mensaje) VALUES (NULL,'$name', '$email', '$subject', '$message')";
$DB->consulta($sql);

$mail = new phpMailer();
$mail->Mailer = "smtp";
$mail->Host = "smtp.gmail.com";
$mail->Port       = 587;
$mail->SMTPAuth = true;
$mail->Username = "andres7amonsalve@gmail.com";
$mail->Password = "1470Caro_";
$mail->From = "Lupablogs@lupajuridica.com";
$mail->FromName = "Contacto LupaBlog";

$mail->AddAddress($email);

$mail->Subject = $subject;
$mail->Body =  "Hii! ".$name." You has been send a mail with Lupablogs Community Blogger and this is your message:  ".$message;

$exito = $mail->Send();
if (!$exito) {
    echo "<br/>" . $mail->ErrorInfo;
} else {
    echo "Ok";
}
