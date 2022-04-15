<?php

namespace App\Tests\Units;

use App\Entity\Admin;
use App\Entity\City;
use App\Entity\Country;
use App\Entity\Company;
use App\Entity\CountryType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Country Test class
 */
class CountryTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param Country $country
     *
     * @return void
     */
    public function testIsTrue(Country $country): void
    {
        $this->assertEquals('02541', $country->getIndicative());
        $this->assertEquals('cy', $country->getFlagFilename());
        $this->assertEquals('country', $country->getName());
        $this->assertInstanceOf(City::class, $country->getCities()->first());
        $this->assertInstanceOf(Admin::class, $country->getAuthor());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param Country $country
     *
     * @return void
     */
    public function testIsFalse(Country $country): void
    {
        $this->assertNotInstanceOf(Company::class, $country->getCities()->first());
        $this->assertNotInstanceOf(Company::class, $country->getAuthor());
        $this->assertNotEquals('nom', $country->getName());
        $this->assertNotEquals('fr', $country->getFlagFilename());
        $this->assertNotEquals('1232', $country->getIndicative());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param Country $country
     *
     * @return void
     */
    public function testIsEmpty(Country $country): void
    {
        $this->assertEmpty($country->getAuthor());
        $this->assertEmpty($country->getName());
        $this->assertEmpty($country->getCities());
        $this->assertEmpty($country->getFlagFilename());
        $this->assertEmpty($country->getIndicative());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $countries = [];
        for ($i = 0; $i < 5; ++$i) {
            $country = new Country();
            $country->setAuthor(new Admin())
                ->setName('country')
                ->setFlagFilename('cy')
                ->setIndicative('02541')
                ->addCity(new City());
            $countries[] = [$country];
        }

        return $countries;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $countries = [];
        for ($i = 0; $i < 5; ++$i) {
            $country = new Country();
            $countries[] = [$country];
        }

        return $countries;
    }
}
