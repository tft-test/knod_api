<?php

namespace App\Tests\Units;

use App\Entity\Admin;
use App\Entity\AdvertCategory;
use App\Entity\Event;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * AdvertCategory Test class
 */
class AdvertCategoryTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param AdvertCategory $advertCategory
     *
     * @return void
     */
    public function testIsTrue(AdvertCategory $advertCategory): void
    {
        $this->assertEquals('category', $advertCategory->getCategory());
        $this->assertInstanceOf(Admin::class, $advertCategory->getAuthor());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param AdvertCategory $advertCategory
     *
     * @return void
     */
    public function testIsFalse(AdvertCategory $advertCategory): void
    {
        $this->assertNotEquals('type', $advertCategory->getCategory());
        $this->assertNotInstanceOf(Event::class, $advertCategory->getAuthor());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param AdvertCategory $advertCategory
     *
     * @return void
     */
    public function testIsEmpty(AdvertCategory $advertCategory): void
    {
        $this->assertEmpty($advertCategory->getAuthor());
        $this->assertEmpty($advertCategory->getCategory());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $companyCategories = [];
        for ($i = 0; $i < 5; ++$i) {
            $advertCategory = new AdvertCategory();
            $advertCategory->setCategory('category')
                ->setAuthor(new Admin());
            $companyCategories[] = [$advertCategory];
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
            $advertCategory = new AdvertCategory();
            $companyCategories[] = [$advertCategory];
        }

        return $companyCategories;
    }
}
