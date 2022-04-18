<?php

namespace App\Tests\Units;

use App\Entity\Address;
use App\Entity\Admin;
use App\Entity\Event;
use App\Entity\EventEvaluation;
use App\Entity\EventEvaluationCategory;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * EventEvaluation Test class
 */
class EventEvaluationEvaluationTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param EventEvaluation $eventEvaluation
     *
     * @return void
     */
    public function testIsTrue(EventEvaluation $eventEvaluation): void
    {
        $this->assertEquals(1, $eventEvaluation->getNbStar());
        $this->assertInstanceOf(User::class, $eventEvaluation->getUser());
        $this->assertInstanceOf(Event::class, $eventEvaluation->getEvent());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param EventEvaluation $eventEvaluation
     *
     * @return void
     */
    public function testIsFalse(EventEvaluation $eventEvaluation): void
    {
        $this->assertNotInstanceOf(EventEvaluation::class, $eventEvaluation->getUser());
        $this->assertNotInstanceOf(EventEvaluation::class, $eventEvaluation->getEvent());
        $this->assertNotEquals(6, $eventEvaluation->getNbStar());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param EventEvaluation $eventEvaluation
     *
     * @return void
     */
    public function testIsEmpty(EventEvaluation $eventEvaluation): void
    {
        $this->assertEmpty($eventEvaluation->getUser());
        $this->assertEmpty($eventEvaluation->getEvent());
        $this->assertEmpty($eventEvaluation->getNbStar());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $eventEvaluations = [];
        for ($i = 0; $i < 5; ++$i) {
            $eventEvaluation = new EventEvaluation();
            $eventEvaluation->setUser(new User())
                ->setEvent(new Event())
                ->setNbStar(1);
            $eventEvaluations[] = [$eventEvaluation];
        }

        return $eventEvaluations;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $eventEvaluations = [];
        for ($i = 0; $i < 5; ++$i) {
            $eventEvaluation = new EventEvaluation();
            $eventEvaluations[] = [$eventEvaluation];
        }

        return $eventEvaluations;
    }
}