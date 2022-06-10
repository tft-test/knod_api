<?php

namespace App\Notification;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class MailerNotification
{
    private string $to;
    private string $template;

    public function __construct(string $to, string $template)
    {
        $this->to = $to;
        $this->template = $template;
    }

    public function registerProfessional(MailerInterface $mailer): void
    {
        // TODO - to get the email from .env
        $from = 'tyty@gmail.com';
        $mail = new TemplatedEmail();
        $from = new Address($from, 'Service Mailing');
        $to = new Address($this->to);
        $subject = 'Register Confirmation';
        $templateHtml = 'email/'.$this->template.'.html.twig';
        $mail->to($to)->from($from)->subject($subject)->htmlTemplate($templateHtml);
        $mailer->send($mail);
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function setTemplate(string $template): MailerNotification
    {
        $this->template = $template;

        return $this;
    }
}
