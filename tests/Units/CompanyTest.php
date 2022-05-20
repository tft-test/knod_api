<?php

namespace App\Tests\Units;

use App\Entity\Address;
use App\Entity\Admin;
use App\Entity\Company;
use App\Entity\CompanyCategory;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Company Test class
 */
class CompanyTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param Company $company
     *
     * @return void
     */
    public function testIsTrue(Company $company): void
    {
        $this->assertInstanceOf(Address::class, $company->getAddresses()->first());
        $this->assertInstanceOf(CompanyCategory::class, $company->getCategory());
        $this->assertInstanceOf(Admin::class, $company->getAuthor());
        $this->assertEquals('company', $company->getName());
        $this->assertEquals('1234567890123', $company->getSiret());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param Company $company
     *
     * @return void
     */
    public function testIsFalse(Company $company): void
    {
        $this->assertNotInstanceOf(Company::class, $company->getAddresses()->first());
        $this->assertNotInstanceOf(Company::class, $company->getCategory());
        $this->assertNotInstanceOf(Address::class, $company->getAuthor());
        $this->assertNotEquals('nome', $company->getName());
        $this->assertNotEquals('0000000000000', $company->getSiret());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param Company $company
     *
     * @return void
     */
    public function testIsEmpty(Company $company): void
    {
        $this->assertEmpty($company->getName());
        $this->assertEmpty($company->getAuthor());
        $this->assertEmpty($company->getCategory());
        $this->assertEmpty($company->getSiret());
        $this->assertEmpty($company->getAddresses()->first());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $companies = [];
        for ($i = 0; $i < 5; ++$i) {
            $company = new Company();
            $company->setName('company')
                ->setAuthor(new Admin())
                ->setCategory(new CompanyCategory())
                ->setSiret('1234567890123')
                ->addAddress(new Address());
            $companies[] = [$company];
        }

        return $companies;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $companies = [];
        for ($i = 0; $i < 5; ++$i) {
            $company = new Company();
            $companies[] = [$company];
        }

        return $companies;
    }
}
