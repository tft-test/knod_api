<?php

namespace App\Tests\Units;

use App\Entity\Admin;
use App\Entity\Taxonomy;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Taxonomy Test class
 */
class TaxonomyTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param Taxonomy $taxonomy
     *
     * @return void
     */
    public function testIsTrue(Taxonomy $taxonomy): void
    {
        $this->assertEquals('name', $taxonomy->getName());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param Taxonomy $taxonomy
     *
     * @return void
     */
    public function testIsFalse(Taxonomy $taxonomy): void
    {
        $this->assertNotEquals('taxonomy', $taxonomy->getName());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param Taxonomy $taxonomy
     *
     * @return void
     */
    public function testIsEmpty(Taxonomy $taxonomy): void
    {
        $this->assertEmpty($taxonomy->getName());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $taxonomys = [];
        for ($i = 0; $i < 5; ++$i) {
            $taxonomy = new Taxonomy();
            $taxonomy->setName('name');
            $taxonomys[] = [$taxonomy];
        }

        return $taxonomys;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $taxonomys = [];
        for ($i = 0; $i < 5; ++$i) {
            $taxonomy = new Taxonomy();
            $taxonomys[] = [$taxonomy];
        }
        return $taxonomys;
    }
}