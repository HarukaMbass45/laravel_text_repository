<?php
declare(strict_types=1);

namespace App\Service;

class UserService
{
    public function sendNotification(string $to, string $message): void
    {
        $mailsender = new MailSender();
        $mailsender->send($to, $message);
    }

}

class MailSender
{
    public function send(string $to, string $message): void
    {
        // メール送信処理
    }
}