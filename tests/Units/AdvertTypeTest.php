<?php

namespace App\Tests\Units;

use App\Entity\Admin;
use App\Entity\Advert;
use App\Entity\Document;
use App\Entity\Event;
use App\Entity\Notification;
use App\Entity\AdvertType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * AdvertType Test class
 */
class AdvertTypeTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param AdvertType $advertType
     *
     * @return void
     */
    public function testIsTrue(AdvertType $advertType): void
    {
        $this->assertInstanceOf(Advert::class, $advertType->getAdverts()->first());
        $this->assertInstanceOf(Admin::class, $advertType->getAuthor());
        $this->assertEquals('advert', $advertType->getType());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param AdvertType $advertType
     *
     * @return void
     */
    public function testIsFalse(AdvertType $advertType): void
    {
        $this->assertNotInstanceOf(User::class, $advertType->getAdverts()->first());
        $this->assertNotInstanceOf(User::class, $advertType->getAuthor());
        $this->assertNotEquals('false', $advertType->getType());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param AdvertType $advertType
     *
     * @return void
     */
    public function testIsEmpty(AdvertType $advertType): void
    {
        $this->assertEmpty($advertType->getType());
        $this->assertEmpty($advertType->getAuthor());
        $this->assertEmpty($advertType->getAdverts());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $advertTypes = [];
        for ($i = 0; $i < 5; ++$i) {
            $advertType = new AdvertType();
            $advertType->setType('advert')
                ->setAuthor(new Admin())
                ->addAdvert(new Advert());
            $advertTypes[] = [$advertType];
        }

        return $advertTypes;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $advertTypes = [];
        for ($i = 0; $i < 5; ++$i) {
            $advertType = new AdvertType();
            $advertTypes[] = [$advertType];
        }

        return $advertTypes;
    }
}
