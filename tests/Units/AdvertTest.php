<?php

namespace App\Tests\Units;

use App\Entity\Admin;
use App\Entity\City;
use App\Entity\Advert;
use App\Entity\Company;
use App\Entity\AdvertType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Advert Test class
 */
class AdvertTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param Advert $advert
     *
     * @return void
     */
    public function testIsTrue(Advert $advert): void
    {
        $this->assertEquals('advert', $advert->getTitle());
        $this->assertInstanceOf(Admin::class, $advert->getAuthor());
        $this->assertInstanceOf(AdvertType::class, $advert->getType());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param Advert $advert
     *
     * @return void
     */
    public function testIsFalse(Advert $advert): void
    {
        $this->assertNotInstanceOf(Company::class, $advert->getAuthor());
        $this->assertNotInstanceOf(Company::class, $advert->getType());
        $this->assertNotEquals('nom', $advert->getTitle());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param Advert $advert
     *
     * @return void
     */
    public function testIsEmpty(Advert $advert): void
    {
        $this->assertEmpty($advert->getAuthor());
        $this->assertEmpty($advert->getType());
        $this->assertEmpty($advert->getTitle());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $adverts = [];
        for ($i = 0; $i < 5; ++$i) {
            $advert = new Advert();
            $advert->setAuthor(new Admin())
                ->setType(new AdvertType())
                ->setTitle('advert');
            $adverts[] = [$advert];
        }

        return $adverts;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $adverts = [];
        for ($i = 0; $i < 5; ++$i) {
            $advert = new Advert();
            $adverts[] = [$advert];
        }

        return $adverts;
    }
}
