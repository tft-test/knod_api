<?php

namespace App\Tests\Units;

use App\Entity\Admin;
use App\Entity\Signal;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Signal Test class
 */
class SignalTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param Signal $signal
     *
     * @return void
     */
    public function testIsTrue(Signal $signal): void
    {
        $this->assertEquals(true, $signal->getStatus());
        $this->assertEquals('reason', $signal->getReason());
        $this->assertInstanceOf(User::class, $signal->getUser());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param Signal $signal
     *
     * @return void
     */
    public function testIsFalse(Signal $signal): void
    {
        $this->assertNotEquals(false, $signal->getStatus());
        $this->assertNotEquals('answer', $signal->getReason());
        $this->assertNotInstanceOf(Signal::class, $signal->getUser());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param Signal $signal
     *
     * @return void
     */
    public function testIsEmpty(Signal $signal): void
    {
        $this->assertEmpty($signal->getStatus());
        $this->assertEmpty($signal->getReason());
        $this->assertEmpty($signal->getUser());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $signals = [];
        for ($i = 0; $i < 5; ++$i) {
            $signal = new Signal();
            $signal->setStatus(true)
                ->setReason('reason')
                ->setUser(new User());
            $signals[] = [$signal];
        }

        return $signals;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $signals = [];
        for ($i = 0; $i < 5; ++$i) {
            $signal = new Signal();
            $signals[] = [$signal];
        }
        return $signals;
    }
}