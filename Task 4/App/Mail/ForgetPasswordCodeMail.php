<?php

namespace App\Mail;

use PHPMailer\PHPMailer\Exception;

class ForgetPasswordCodeMail extends Mail
{
    public function send($mailTo, $subject, $body): bool
    {
        try {
            $this->mail->setFrom(self::MAILUSERNAME, 'Forget Password Mail');
            $this->mail->addAddress($mailTo);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
            return false;
        }
    }
}
