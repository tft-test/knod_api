<?php

namespace App\Tests\Units;

use App\Entity\Admin;
use App\Entity\Contact;
use App\Entity\Company;
use App\Entity\ContactType;
use App\Entity\Event;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Contact Test class
 */
class ContactTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param Contact $contact
     *
     * @return void
     */
    public function testIsTrue(Contact $contact): void
    {
        $this->assertEquals('message', $contact->getMessage());
        $this->assertEquals('email@domain.ext', $contact->getEmail());
        $this->assertEquals('subject', $contact->getSubject());
        $this->assertEquals(true, $contact->getStatus());
        $this->assertInstanceOf(Admin::class, $contact->getSupportBy());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param Contact $contact
     *
     * @return void
     */
    public function testIsFalse(Contact $contact): void
    {
        $this->assertNotInstanceOf(Event::class, $contact->getSupportBy());
        $this->assertNotEquals('subjecto', $contact->getSubject());
        $this->assertNotEquals('email@domain.extension', $contact->getEmail());
        $this->assertNotEquals('mesagem', $contact->getMessage());
        $this->assertNotEquals(false, $contact->getStatus());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param Contact $contact
     *
     * @return void
     */
    public function testIsEmpty(Contact $contact): void
    {
        $this->assertEmpty($contact->getMessage());
        $this->assertEmpty($contact->getStatus());
        $this->assertEmpty($contact->getEmail());
        $this->assertEmpty($contact->getSubject());
        $this->assertEmpty($contact->getSupportBy());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $contacts = [];
        for ($i = 0; $i < 5; ++$i) {
            $contact = new Contact();
            $contact->setMessage('message')
                ->setStatus(true)
                ->setEmail('email@domain.ext')
                ->setSubject('subject')
                ->setSupportBy(new Admin());
            $contacts[] = [$contact];
        }

        return $contacts;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $contacts = [];
        for ($i = 0; $i < 5; ++$i) {
            $contact = new Contact();
            $contacts[] = [$contact];
        }

        return $contacts;
    }
}
