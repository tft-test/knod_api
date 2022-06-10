<?php

namespace App\Services;

use App\Entity\User;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class SendEmailHelper
{

    public function __construct(
        private MailerInterface $mailer,
        private ParameterBagInterface $bag
    ) {
    }

    public function welcomeUser(User $user): void
    {
        try {
            $template_v = 'email/register.html.twig';
            $from = new Address($this->bag->get('noreply.mailer'), 'Welcome');
            $to = new Address($user->getEmail(), $user->getFirstname());
            $subject = 'We welcome you for your subscription';
            $email = (new TemplatedEmail())
                ->from($from)
                ->to($to)
                ->subject($subject)
                ->context(['user' => $user])
                ->htmlTemplate($template_v);
            $this->mailer->send($email);
        } catch (\Exception $exception) {
            throw new NotFoundHttpException($exception->getMessage());
        }
    }
}
