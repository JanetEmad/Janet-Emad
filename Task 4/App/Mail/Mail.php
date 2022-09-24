<?php

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

abstract class Mail
{
    protected const MAILHOST = 'smtp-mail.outlook.com';
    protected const MAILUSERNAME = 'janet_nti@outlook.com';
    protected const MAILPASSWORD = 'Janet@12345';
    protected const MAILPORT = 587;
    protected const MAILENCRYPTION = PHPMailer::ENCRYPTION_STARTTLS;
    protected PHPMailer $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = SMTP::DEBUG_OFF;
        $this->mail->isSMTP();
        $this->mail->Host       = self::MAILHOST;
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = self::MAILUSERNAME;
        $this->mail->Password   = self::MAILPASSWORD;
        $this->mail->SMTPSecure = self::MAILENCRYPTION;
        $this->mail->Port       = self::MAILPORT;
    }

    public abstract function send($mailTo, $subject, $body): bool;
}
