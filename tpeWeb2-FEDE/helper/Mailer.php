<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require_once './phpmailer/Exception.php';
require_once './phpmailer/PHPMailer.php';
require_once './phpmailer/SMTP.php';


class Mailer
{
    private $mail;

    function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    function sendMail($username, $subject, $body)
    {
        try {
            //Server settings
            $this->mail->SMTPDebug = 0; // Enable verbose debug output
            $this->mail->isSMTP(); // Send using SMTP
            $this->mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $this->mail->SMTPAuth = true; // Enable SMTP authentication
            $this->mail->Username = 'movie.club.latam@gmail.com'; // SMTP username
            $this->mail->Password = 'movieclub123'; // SMTP password
            $this->mail->SMTPSecure = 'tls'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $this->mail->Port = 587; // TCP port to connect to

            //Recipients
            $this->mail->setFrom('gwiradric.ps3@gmail.com', 'Movie Club');
            $this->mail->addAddress($username); // Add a recipient

            // Content
            $this->mail->isHTML(true); // Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;


            $this->mail->send();
            $message = 'Message has been sent';
            return $message;
        } catch (Exception $e) {
            $message = "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
            return $message;
        }
    }
}
