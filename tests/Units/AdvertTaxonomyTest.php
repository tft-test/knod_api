<?php

namespace App\Tests\Units;

use App\Entity\Address;
use App\Entity\Admin;
use App\Entity\Advert;
use App\Entity\Event;
use App\Entity\AdvertTaxonomy;
use App\Entity\AdvertTaxonomyCategory;
use App\Entity\Taxonomy;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * AdvertTaxonomy Test class
 */
class AdvertTaxonomyTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param AdvertTaxonomy $advertTaxonomy
     *
     * @return void
     */
    public function testIsTrue(AdvertTaxonomy $advertTaxonomy): void
    {
        $this->assertInstanceOf(Taxonomy::class, $advertTaxonomy->getTaxonomy());
        $this->assertInstanceOf(Advert::class, $advertTaxonomy->getAdvert());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param AdvertTaxonomy $advertTaxonomy
     *
     * @return void
     */
    public function testIsFalse(AdvertTaxonomy $advertTaxonomy): void
    {
        $this->assertNotInstanceOf(AdvertTaxonomy::class, $advertTaxonomy->getAdvert());
        $this->assertNotInstanceOf(AdvertTaxonomy::class, $advertTaxonomy->getTaxonomy());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param AdvertTaxonomy $advertTaxonomy
     *
     * @return void
     */
    public function testIsEmpty(AdvertTaxonomy $advertTaxonomy): void
    {
        $this->assertEmpty($advertTaxonomy->getTaxonomy());
        $this->assertEmpty($advertTaxonomy->getAdvert());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $advertTaxonomies = [];
        for ($i = 0; $i < 5; ++$i) {
            $advertTaxonomy = new AdvertTaxonomy();
            $advertTaxonomy->setAdvert(new Advert())
                ->setTaxonomy(new Taxonomy());
            $advertTaxonomies[] = [$advertTaxonomy];
        }

        return $advertTaxonomies;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $advertTaxonomies = [];
        for ($i = 0; $i < 5; ++$i) {
            $advertTaxonomy = new AdvertTaxonomy();
            $advertTaxonomies[] = [$advertTaxonomy];
        }

        return $advertTaxonomies;
    }
}