<?php

namespace App\Tests\Units;

use App\Entity\Admin;
use App\Entity\Document;
use App\Entity\Event;
use App\Entity\Notification;
use App\Entity\DocumentType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * DocumentType Test class
 */
class DocumentTypeTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param DocumentType $documentType
     *
     * @return void
     */
    public function testIsTrue(DocumentType $documentType): void
    {
        $this->assertInstanceOf(Document::class, $documentType->getDocuments()->first());
        $this->assertEquals('idCard', $documentType->getType());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param DocumentType $documentType
     *
     * @return void
     */
    public function testIsFalse(DocumentType $documentType): void
    {
        $this->assertNotInstanceOf(User::class, $documentType->getDocuments()->first());
        $this->assertNotEquals('false', $documentType->getType());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param DocumentType $documentType
     *
     * @return void
     */
    public function testIsEmpty(DocumentType $documentType): void
    {
        $this->assertEmpty($documentType->getType());
        $this->assertEmpty($documentType->getDocuments());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $documentTypes = [];
        for ($i = 0; $i < 5; ++$i) {
            $documentType = new DocumentType();
            $documentType->setType('idCard')
                ->addDocument(new Document());
            $documentTypes[] = [$documentType];
        }

        return $documentTypes;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $documentTypes = [];
        for ($i = 0; $i < 5; ++$i) {
            $documentType = new DocumentType();
            $documentTypes[] = [$documentType];
        }

        return $documentTypes;
    }
}
