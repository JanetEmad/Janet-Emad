<?php

namespace App\Mail;

use PHPMailer\PHPMailer\Exception;

class VerificationCodeMail extends Mail
{
    public function send($mailTo, $subject, $body): bool
    {
        try {
            $this->mail->setFrom(self::MAILUSERNAME, 'Verification Code Mail');
            $this->mail->addAddress($mailTo);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
