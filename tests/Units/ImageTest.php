<?php

namespace App\Tests\Units;

use App\Entity\Admin;
use App\Entity\Image;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Image Test class
 */
class ImageTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param Image $image
     *
     * @return void
     */
    public function testIsTrue(Image $image): void
    {
        $this->assertEquals('../public/filename.jpg', $image->getFilename());
        $this->assertEquals('application/jpg', $image->getMime());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param Image $image
     *
     * @return void
     */
    public function testIsFalse(Image $image): void
    {
        $this->assertNotEquals('../public/filename.png', $image->getFilename());
        $this->assertNotEquals('application/png', $image->getMime());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param Image $image
     *
     * @return void
     */
    public function testIsEmpty(Image $image): void
    {
        $this->assertEmpty($image->getFilename());
        $this->assertEmpty($image->getMime());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $images = [];
        for ($i = 0; $i < 5; ++$i) {
            $image = new Image();
            $image->setFilename('../public/filename.jpg')
                ->setMime('application/jpg');
            $images[] = [$image];
        }

        return $images;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $images = [];
        for ($i = 0; $i < 5; ++$i) {
            $image = new Image();
            $images[] = [$image];
        }
        return $images;
    }
}