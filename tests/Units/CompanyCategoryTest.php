<?php

namespace App\Tests\Units;

use App\Entity\Admin;
use App\Entity\Company;
use App\Entity\Event;
use App\Entity\CompanyCategory;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * CompanyCategory Test class
 */
class CompanyCategoryTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param CompanyCategory $companyCategory
     *
     * @return void
     */
    public function testIsTrue(CompanyCategory $companyCategory): void
    {
        $this->assertEquals('category', $companyCategory->getCategory());
        $this->assertInstanceOf(Company::class, $companyCategory->getCompanies()->first());
        $this->assertInstanceOf(Admin::class, $companyCategory->getAuthor());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param CompanyCategory $companyCategory
     *
     * @return void
     */
    public function testIsFalse(CompanyCategory $companyCategory): void
    {
        $this->assertNotEquals('type', $companyCategory->getCategory());
        $this->assertNotInstanceOf(User::class, $companyCategory->getCompanies()->first());
        $this->assertNotInstanceOf(User::class, $companyCategory->getAuthor());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param CompanyCategory $companyCategory
     *
     * @return void
     */
    public function testIsEmpty(CompanyCategory $companyCategory): void
    {
        $this->assertEmpty($companyCategory->getAuthor());
        $this->assertEmpty($companyCategory->getCategory());
        $this->assertEmpty($companyCategory->getCompanies()->first());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $companyCategories = [];
        for ($i = 0; $i < 5; ++$i) {
            $companyCategory = new CompanyCategory();
            $companyCategory->setCategory('category')
                ->setAuthor(new Admin())
                ->addCompany(new Company());
            $companyCategories[] = [$companyCategory];
        }

        return $companyCategories;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $companyCategories = [];
        for ($i = 0; $i < 5; ++$i) {
            $companyCategory = new CompanyCategory();
            $companyCategories[] = [$companyCategory];
        }

        return $companyCategories;
    }
}
