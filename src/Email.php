<?php

namespace manuel\cine;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Email
{
    // usuario: proyectoentradascine@gmail.com
    // contraseña: Abcd123.

    private const HOST = 'smtp.gmail.com';
    private const USER = 'proyectoentradascine@gmail.com';
    private const PASSWORD = 'Abcd123.';

    public static function send(String $direction, String $text): bool
    {
        $mail = new PHPMailer();

        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = self::HOST;
        $mail->SMTPAuth = true;
        $mail->Username = self::USER;
        $mail->Password = self::PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //Recipients
        $mail->setFrom(self::USER, 'Manuel');
        $mail->addAddress($direction);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Compra Entradas';
        $mail->Body = $text;
        $mail->AltBody = $text;

        return $mail->send();
    }
}