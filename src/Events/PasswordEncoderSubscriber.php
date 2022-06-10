<?php

namespace App\Events;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use App\Services\SendEmailHelper;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PasswordEncoderSubscriber implements EventSubscriberInterface
{

    public function __construct(
        private UserPasswordHasherInterface $passwordHasher,
        private ParameterBagInterface $bag,
        private SendEmailHelper $sendEmailHelper
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::VIEW => ['encodePassword', EventPriorities::PRE_WRITE],
        ];
    }

    public function encodePassword(ViewEvent $event): void
    {
        $user = $event->getControllerResult();
        $methode = $event->getRequest()->getMethod();

        if ($user instanceof User && $methode === "POST") {
            $hash = $this->passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hash);

            //TODO - to send email to this user
            $this->sendEmailHelper->welcomeUser($user);
        }
    }

    public function validateResponse(ResponseEvent $event): void
    {
        //dd($event->getResponse());
        // username and password
        $request = json_decode($event->getRequest()->getContent(), false);
        //dd($request);
    }

//    public function validate(RequestEvent $event): void
//    {
//        dd($event->getResponse());
//        // username and password
//        $request = json_decode($event->getRequest()->getContent(), false);
//        dd($request);
//    }
}
