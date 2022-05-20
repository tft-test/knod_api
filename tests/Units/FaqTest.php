<?php

namespace App\Tests\Units;

use App\Entity\Admin;
use App\Entity\Faq;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Faq Test class
 */
class FaqTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param Faq $faq
     *
     * @return void
     */
    public function testIsTrue(Faq $faq): void
    {
        $this->assertEquals(true, $faq->getStatus());
        $this->assertEquals('question', $faq->getQuestion());
        $this->assertInstanceOf(Admin::class, $faq->getAuthor());
        $this->assertEquals('answer', $faq->getAnswer());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param Faq $faq
     *
     * @return void
     */
    public function testIsFalse(Faq $faq): void
    {
        $this->assertNotEquals(false, $faq->getStatus());
        $this->assertNotEquals('answer', $faq->getQuestion());
        $this->assertNotInstanceOf(Faq::class, $faq->getAuthor());
        $this->assertNotEquals('question', $faq->getAnswer());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param Faq $faq
     *
     * @return void
     */
    public function testIsEmpty(Faq $faq): void
    {
        $this->assertEmpty($faq->getAnswer());
        $this->assertEmpty($faq->getAuthor());
        $this->assertEmpty($faq->getQuestion());
        $this->assertFalse($faq->getStatus());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $Faqs = [];
        for ($i = 0; $i < 5; ++$i) {
            $faq = new Faq();
            $faq->setAnswer('answer')
                ->setAuthor(new Admin())
                ->setQuestion("question")
                ->setStatus(true);
            $Faqs[] = [$faq];
        }

        return $Faqs;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $Faqs = [];
        for ($i = 0; $i < 5; ++$i) {
            $faq = new Faq();
            $Faqs[] = [$faq];
        }
        return $Faqs;
    }
}