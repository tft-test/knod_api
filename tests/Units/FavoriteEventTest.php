<?php

namespace App\Tests\Units;

use App\Entity\Address;
use App\Entity\Admin;
use App\Entity\Event;
use App\Entity\FavoriteEvent;
use App\Entity\FavoriteEventCategory;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * FavoriteEvent Test class
 */
class FavoriteEventTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param FavoriteEvent $favoriteEvent
     *
     * @return void
     */
    public function testIsTrue(FavoriteEvent $favoriteEvent): void
    {
        $this->assertInstanceOf(User::class, $favoriteEvent->getUser());
        $this->assertInstanceOf(Event::class, $favoriteEvent->getEvent());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param FavoriteEvent $favoriteEvent
     *
     * @return void
     */
    public function testIsFalse(FavoriteEvent $favoriteEvent): void
    {
        $this->assertNotInstanceOf(FavoriteEvent::class, $favoriteEvent->getUser());
        $this->assertNotInstanceOf(FavoriteEvent::class, $favoriteEvent->getEvent());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param FavoriteEvent $favoriteEvent
     *
     * @return void
     */
    public function testIsEmpty(FavoriteEvent $favoriteEvent): void
    {
        $this->assertEmpty($favoriteEvent->getUser());
        $this->assertEmpty($favoriteEvent->getEvent());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $favoriteEvents = [];
        for ($i = 0; $i < 5; ++$i) {
            $favoriteEvent = new FavoriteEvent();
            $favoriteEvent->setUser(new User())
                ->setEvent(new Event());
            $favoriteEvents[] = [$favoriteEvent];
        }

        return $favoriteEvents;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $favoriteEvents = [];
        for ($i = 0; $i < 5; ++$i) {
            $favoriteEvent = new FavoriteEvent();
            $favoriteEvents[] = [$favoriteEvent];
        }

        return $favoriteEvents;
    }
}