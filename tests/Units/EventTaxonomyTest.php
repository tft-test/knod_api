<?php

namespace App\Tests\Units;

use App\Entity\Event;
use App\Entity\EventTaxonomy;
use App\Entity\Taxonomy;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * EventTaxonomy Test class
 */
class EventTaxonomyTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param EventTaxonomy $eventTaxonomy
     *
     * @return void
     */
    public function testIsTrue(EventTaxonomy $eventTaxonomy): void
    {
        $this->assertInstanceOf(Taxonomy::class, $eventTaxonomy->getTaxonomy());
        $this->assertInstanceOf(Event::class, $eventTaxonomy->getEvent());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param EventTaxonomy $eventTaxonomy
     *
     * @return void
     */
    public function testIsFalse(EventTaxonomy $eventTaxonomy): void
    {
        $this->assertNotInstanceOf(EventTaxonomy::class, $eventTaxonomy->getTaxonomy());
        $this->assertNotInstanceOf(EventTaxonomy::class, $eventTaxonomy->getEvent());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param EventTaxonomy $eventTaxonomy
     *
     * @return void
     */
    public function testIsEmpty(EventTaxonomy $eventTaxonomy): void
    {
        $this->assertEmpty($eventTaxonomy->getTaxonomy());
        $this->assertEmpty($eventTaxonomy->getEvent());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $eventTaxonomies = [];
        for ($i = 0; $i < 5; ++$i) {
            $eventTaxonomy = new EventTaxonomy();
            $eventTaxonomy->setTaxonomy(new Taxonomy())
                ->setEvent(new Event());
            $eventTaxonomies[] = [$eventTaxonomy];
        }

        return $eventTaxonomies;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $eventTaxonomies = [];
        for ($i = 0; $i < 5; ++$i) {
            $eventTaxonomy = new EventTaxonomy();
            $eventTaxonomies[] = [$eventTaxonomy];
        }

        return $eventTaxonomies;
    }
}