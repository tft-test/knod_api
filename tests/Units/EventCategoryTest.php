<?php

namespace App\Tests\Units;

use App\Entity\Admin;
use App\Entity\Event;
use App\Entity\EventCategory;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * EventCategory Test class
 */
class EventCategoryTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param EventCategory $eventCategory
     *
     * @return void
     */
    public function testIsTrue(EventCategory $eventCategory): void
    {
        $this->assertEquals('category', $eventCategory->getCategory());
        $this->assertInstanceOf(Event::class, $eventCategory->getEvents()->first());
        $this->assertInstanceOf(Admin::class, $eventCategory->getAuthor());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param EventCategory $eventCategory
     *
     * @return void
     */
    public function testIsFalse(EventCategory $eventCategory): void
    {
        $this->assertNotEquals('type', $eventCategory->getCategory());
        $this->assertNotInstanceOf(User::class, $eventCategory->getEvents()->first());
        $this->assertNotInstanceOf(Event::class, $eventCategory->getAuthor());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param EventCategory $eventCategory
     *
     * @return void
     */
    public function testIsEmpty(EventCategory $eventCategory): void
    {
        $this->assertEmpty($eventCategory->getAuthor());
        $this->assertEmpty($eventCategory->getCategory());
        $this->assertEmpty($eventCategory->getEvents());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $eventCategorys = [];
        for ($i = 0; $i < 5; ++$i) {
            $eventCategory = new EventCategory();
            $eventCategory->setCategory('category')
                ->setAuthor(new Admin())
                ->addEvent(new Event());
            $eventCategorys[] = [$eventCategory];
        }

        return $eventCategorys;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $eventCategorys = [];
        for ($i = 0; $i < 5; ++$i) {
            $eventCategory = new EventCategory();
            $eventCategorys[] = [$eventCategory];
        }
        return $eventCategorys;
    }
}
