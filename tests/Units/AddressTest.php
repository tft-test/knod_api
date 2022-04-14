<?php

namespace App\Tests\Units;

use App\Entity\Admin;
use App\Entity\Address;
use App\Entity\City;
use App\Entity\Company;
use App\Entity\Event;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Address Test class
 */
class AddressTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param Address $address
     *
     * @return void
     */
    public function testIsTrue(Address $address): void
    {
        $this->assertEquals('street', $address->getStreet());
        $this->assertEquals(2, $address->getNumber());
        $this->assertInstanceOf(User::class, $address->getUser());
        $this->assertInstanceOf(Company::class, $address->getCompany());
        $this->assertInstanceOf(Event::class, $address->getEvents()->first());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param Address $address
     *
     * @return void
     */
    public function testIsFalse(Address $address): void
    {
        $this->assertNotEquals('rue', $address->getStreet());
        $this->assertNotEquals('1', $address->getNumber());
        $this->assertNotInstanceOf(User::class, $address->getCompany());
        $this->assertNotInstanceOf(Company::class, $address->getUser());
        $this->assertNotInstanceOf(Admin::class, $address->getEvents()->first());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param Address $address
     *
     * @return void
     */
    public function testIsEmpty(Address $address): void
    {
        $this->assertEmpty($address->getNumber());
        $this->assertEmpty($address->getStreet());
        $this->assertEmpty($address->getUser());
        $this->assertEmpty($address->getCompany());
        $this->assertEmpty($address->getCity());
        $this->assertEmpty($address->getEvents());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $addresses = [];
        for ($i = 0; $i < 5; ++$i) {
            $address = new Address();
            $address->setUser(new User())
                ->setCity(new City())
                ->setCompany(new Company())
                ->setNumber(2)
                ->setStreet('street')
                ->addEvent(new Event());
            $addresses[] = [$address];
        }

        return $addresses;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $addresses = [];
        for ($i = 0; $i < 5; ++$i) {
            $address = new Address();
            $addresses[] = [$address];
        }
        return $addresses;
    }
}