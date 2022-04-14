<?php

namespace App\Tests\Units;

use App\Entity\Admin;
use App\Entity\Notification;
use App\Entity\City;
use App\Entity\Company;
use App\Entity\Event;
use App\Entity\NotificationType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Notification Test class
 */
class NotificationTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param Notification $notification
     *
     * @return void
     */
    public function testIsTrue(Notification $notification): void
    {
        $this->assertInstanceOf(User::class, $notification->getUser());
        $this->assertInstanceOf(NotificationType::class, $notification->getType());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param Notification $notification
     *
     * @return void
     */
    public function testIsFalse(Notification $notification): void
    {
        $this->assertNotInstanceOf(Company::class, $notification->getUser());
        $this->assertNotInstanceOf(Company::class, $notification->getType());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param Notification $notification
     *
     * @return void
     */
    public function testIsEmpty(Notification $notification): void
    {
        $this->assertEmpty($notification->getUser());
        $this->assertEmpty($notification->getType());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $notifications = [];
        for ($i = 0; $i < 5; ++$i) {
            $notification = new Notification();
            $notification->setUser(new User())
                ->setType(new NotificationType());
            $notifications[] = [$notification];
        }

        return $notifications;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $notifications = [];
        for ($i = 0; $i < 5; ++$i) {
            $notification = new Notification();
            $notifications[] = [$notification];
        }

        return $notifications;
    }
}
