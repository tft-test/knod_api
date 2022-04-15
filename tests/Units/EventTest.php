<?php

namespace App\Tests\Units;

use App\Entity\Address;
use App\Entity\Admin;
use App\Entity\Event;
use App\Entity\EventCategory;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Event Test class
 */
class EventTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param Event $event
     *
     * @return void
     */
    public function testIsTrue(Event $event): void
    {
        $this->assertEquals(1, $event->getNbPlace());
        $this->assertEquals('event', $event->getTitle());
        $this->assertEquals('description', $event->getDescription());
        $this->assertInstanceOf(Address::class, $event->getAddress());
        $this->assertInstanceOf(User::class, $event->getAuthor());
        $this->assertInstanceOf(EventCategory::class, $event->getCategory());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param Event $event
     *
     * @return void
     */
    public function testIsFalse(Event $event): void
    {
        $this->assertNotEquals('evento', $event->getTitle());
        $this->assertNotEquals('desciption', $event->getDescription());
        $this->assertNotInstanceOf(Event::class, $event->getAuthor());
        $this->assertNotInstanceOf(Event::class, $event->getAddress());
        $this->assertNotInstanceOf(Event::class, $event->getCategory());
        $this->assertNotEquals(9, $event->getNbPlace());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param Event $event
     *
     * @return void
     */
    public function testIsEmpty(Event $event): void
    {
        $this->assertEmpty($event->getTitle());
        $this->assertEmpty($event->getDescription());
        $this->assertEmpty($event->getCategory());
        $this->assertEmpty($event->getAuthor());
        $this->assertEmpty($event->getAddress());
        $this->assertEmpty($event->getNbPlace());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $events = [];
        for ($i = 0; $i < 5; ++$i) {
            $event = new Event();
            $event->setAuthor(new User())
                ->setTitle('event')
                ->setDescription('description')
                ->setNbPlace(1)
                ->setAddress(new Address())
                ->setCategory(new EventCategory());
            $events[] = [$event];
        }

        return $events;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $events = [];
        for ($i = 0; $i < 5; ++$i) {
            $event = new Event();
            $events[] = [$event];
        }

        return $events;
    }
}