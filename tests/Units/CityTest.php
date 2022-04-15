<?php

namespace App\Tests\Units;

use App\Entity\Address;
use App\Entity\Admin;
use App\Entity\City;
use App\Entity\Country;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * City Test class
 */
class CityTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param City $city
     *
     * @return void
     */
    public function testIsTrue(City $city): void
    {
        $this->assertEquals(12345, $city->getZipcode());
        $this->assertEquals('city', $city->getName());
        $this->assertInstanceOf(Admin::class, $city->getAuthor());
        $this->assertInstanceOf(Address::class, $city->getAddresses()->first());
        $this->assertInstanceOf(Country::class, $city->getCountry());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param City $city
     *
     * @return void
     */
    public function testIsFalse(City $city): void
    {
        $this->assertNotEquals(321654, $city->getZipcode());
        $this->assertNotEquals('answer', $city->getName());
        $this->assertNotInstanceOf(City::class, $city->getAddresses()->first());
        $this->assertNotInstanceOf(City::class, $city->getCountry());
        $this->assertNotInstanceOf(User::class, $city->getAuthor());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param City $city
     *
     * @return void
     */
    public function testIsEmpty(City $city): void
    {
        $this->assertEmpty($city->getAddresses()->first());
        $this->assertEmpty($city->getCountry());
        $this->assertEmpty($city->getAuthor());
        $this->assertEmpty($city->getName());
        $this->assertEmpty($city->getZipcode());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $cities = [];
        for ($i = 0; $i < 5; ++$i) {
            $city = new City();
            $city->setName('city')
                ->setAuthor(new Admin())
                ->setZipcode(12345)
                ->setCountry(new Country())
                ->addAddress(new Address());
            $cities[] = [$city];
        }

        return $cities;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $cities = [];
        for ($i = 0; $i < 5; ++$i) {
            $city = new City();
            $cities[] = [$city];
        }

        return $cities;
    }
}