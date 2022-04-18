<?php

namespace App\Tests\Units;

use App\Entity\Address;
use App\Entity\Admin;
use App\Entity\Event;
use App\Entity\Subscriber;
use App\Entity\SubscriberCategory;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Subscriber Test class
 */
class SubscriberTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param Subscriber $subscriber
     *
     * @return void
     */
    public function testIsTrue(Subscriber $subscriber): void
    {
        $this->assertInstanceOf(User::class, $subscriber->getUser());
        $this->assertInstanceOf(Event::class, $subscriber->getEvent());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param Subscriber $subscriber
     *
     * @return void
     */
    public function testIsFalse(Subscriber $subscriber): void
    {
        $this->assertNotInstanceOf(Subscriber::class, $subscriber->getUser());
        $this->assertNotInstanceOf(Subscriber::class, $subscriber->getEvent());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param Subscriber $subscriber
     *
     * @return void
     */
    public function testIsEmpty(Subscriber $subscriber): void
    {
        $this->assertEmpty($subscriber->getUser());
        $this->assertEmpty($subscriber->getEvent());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $subscribers = [];
        for ($i = 0; $i < 5; ++$i) {
            $subscriber = new Subscriber();
            $subscriber->setUser(new User())
                ->setEvent(new Event());
            $subscribers[] = [$subscriber];
        }

        return $subscribers;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $subscribers = [];
        for ($i = 0; $i < 5; ++$i) {
            $subscriber = new Subscriber();
            $subscribers[] = [$subscriber];
        }

        return $subscribers;
    }
}