<?php

namespace App\Tests\Units;

use App\Entity\Admin;
use App\Entity\Document;
use App\Entity\Company;
use App\Entity\DocumentType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Document Test class
 */
class DocumentTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param Document $document
     *
     * @return void
     */
    public function testIsTrue(Document $document): void
    {
        $this->assertEquals('filename', $document->getFilename());
        $this->assertInstanceOf(User::class, $document->getUser());
        $this->assertInstanceOf(DocumentType::class, $document->getType());
        $this->assertInstanceOf(Admin::class, $document->getValidator());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param Document $document
     *
     * @return void
     */
    public function testIsFalse(Document $document): void
    {
        $this->assertNotInstanceOf(Company::class, $document->getUser());
        $this->assertNotInstanceOf(Company::class, $document->getType());
        $this->assertNotInstanceOf(User::class, $document->getValidator());
        $this->assertNotEquals('false', $document->getFilename());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param Document $document
     *
     * @return void
     */
    public function testIsEmpty(Document $document): void
    {
        $this->assertEmpty($document->getUser());
        $this->assertEmpty($document->getType());
        $this->assertEmpty($document->getFilename());
        $this->assertEmpty($document->getValidator());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $documents = [];
        for ($i = 0; $i < 5; ++$i) {
            $document = new Document();
            $document->setUser(new User())
                ->setType(new DocumentType())
                ->setFilename('filename')
                ->setValidator(new Admin());
            $documents[] = [$document];
        }

        return $documents;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $documents = [];
        for ($i = 0; $i < 5; ++$i) {
            $document = new Document();
            $documents[] = [$document];
        }

        return $documents;
    }
}
