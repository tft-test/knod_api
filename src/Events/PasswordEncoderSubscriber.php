<?php

namespace App\Events;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PasswordEncoderSubscriber implements EventSubscriberInterface
{

    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::VIEW => ['encodePassword', EventPriorities::PRE_WRITE],
//            KernelEvents::RESPONSE => ['validateResponse', EventPriorities::PRE_RESPOND],
            //KernelEvents::REQUEST => ['validate', EventPriorities::PRE_RESPOND],
        ];
    }

    public function encodePassword(ViewEvent $event): void
    {
        $user = $event->getControllerResult();
        $methode = $event->getRequest()->getMethod();

        if ($user instanceof User && $methode === "POST") {
            $hash = $this->passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hash);
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
