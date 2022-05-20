<?php

namespace App\Tests\Units;

use App\Entity\Address;
use App\Entity\Admin;
use App\Entity\Event;
use App\Entity\Notification;
use App\Entity\NotificationType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * NotificationType Test class
 */
class NotificationTypeTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param NotificationType $notificationType
     *
     * @return void
     */
    public function testIsTrue(NotificationType $notificationType): void
    {
        $this->assertInstanceOf(Notification::class, $notificationType->getNotifications()->first());
        $this->assertInstanceOf(Admin::class, $notificationType->getAuthor());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param NotificationType $notificationType
     *
     * @return void
     */
    public function testIsFalse(NotificationType $notificationType): void
    {
        $this->assertNotInstanceOf(User::class, $notificationType->getNotifications()->first());
        $this->assertNotInstanceOf(Address::class, $notificationType->getAuthor());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param NotificationType $notificationType
     *
     * @return void
     */
    public function testIsEmpty(NotificationType $notificationType): void
    {
        $this->assertEmpty($notificationType->getAuthor());
        $this->assertEmpty($notificationType->getNotifications());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $notificationTypes = [];
        for ($i = 0; $i < 5; ++$i) {
            $notificationType = new NotificationType();
            $notificationType->addNotification(new Notification())
                ->setAuthor(new Admin());
            $notificationTypes[] = [$notificationType];
        }

        return $notificationTypes;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $notificationTypes = [];
        for ($i = 0; $i < 5; ++$i) {
            $notificationType = new NotificationType();
            $notificationTypes[] = [$notificationType];
        }
        return $notificationTypes;
    }
}
