<?php

namespace App\Tests\Units;

use App\Entity\EventCategory;
use App\Entity\FavoriteEventCategory;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * FavoriteEventCategory Test class
 */
class FavoriteEventCategoryTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param FavoriteEventCategory $favoriteEventCategory
     *
     * @return void
     */
    public function testIsTrue(FavoriteEventCategory $favoriteEventCategory): void
    {
        $this->assertInstanceOf(User::class, $favoriteEventCategory->getUser());
        $this->assertInstanceOf(EventCategory::class, $favoriteEventCategory->getEventCategory());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param FavoriteEventCategory $favoriteEventCategory
     *
     * @return void
     */
    public function testIsFalse(FavoriteEventCategory $favoriteEventCategory): void
    {
        $this->assertNotInstanceOf(FavoriteEventCategory::class, $favoriteEventCategory->getUser());
        $this->assertNotInstanceOf(FavoriteEventCategory::class, $favoriteEventCategory->getEventCategory());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param FavoriteEventCategory $favoriteEventCategory
     *
     * @return void
     */
    public function testIsEmpty(FavoriteEventCategory $favoriteEventCategory): void
    {
        $this->assertEmpty($favoriteEventCategory->getUser());
        $this->assertEmpty($favoriteEventCategory->getEventCategory());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $favoriteEventCategories = [];
        for ($i = 0; $i < 5; ++$i) {
            $favoriteEventCategory = new FavoriteEventCategory();
            $favoriteEventCategory->setUser(new User())
                ->setEventCategory(new EventCategory());
            $favoriteEventCategories[] = [$favoriteEventCategory];
        }

        return $favoriteEventCategories;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $favoriteEventCategories = [];
        for ($i = 0; $i < 5; ++$i) {
            $favoriteEventCategory = new FavoriteEventCategory();
            $favoriteEventCategories[] = [$favoriteEventCategory];
        }

        return $favoriteEventCategories;
    }
}