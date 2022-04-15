<?php

namespace App\Tests\Units;

use App\Entity\Address;
use App\Entity\Advert;
use App\Entity\AdvertCategory;
use App\Entity\AdvertType;
use App\Entity\City;
use App\Entity\Company;
use App\Entity\CompanyCategory;
use App\Entity\Contact;
use App\Entity\Country;
use App\Entity\Document;
use App\Entity\Event;
use App\Entity\EventCategory;
use App\Entity\Faq;
use App\Entity\Message;
use App\Entity\Notification;
use App\Entity\NotificationType;
use App\Entity\Signal;
use App\Entity\Admin;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Admin Test class
 */
class AdminTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param Admin $admin
     *
     * @return void
     */
    public function testIsTrue(Admin $admin): void
    {
        $this->assertInstanceOf(Document::class, $admin->getDocuments()->first());
        $this->assertInstanceOf(Contact::class, $admin->getContacts()->first());
        $this->assertInstanceOf(Faq::class, $admin->getFaqs()->first());
        $this->assertInstanceOf(EventCategory::class, $admin->getEventCategories()->first());
        $this->assertInstanceOf(Company::class, $admin->getCompanies()->first());
        $this->assertInstanceOf(CompanyCategory::class, $admin->getCompanyCategories()->first());
        $this->assertInstanceOf(Advert::class, $admin->getAdverts()->first());
        $this->assertInstanceOf(AdvertCategory::class, $admin->getAdvertCategories()->first());
        $this->assertInstanceOf(AdvertType::class, $admin->getAdvertTypes()->first());
        $this->assertInstanceOf(City::class, $admin->getCities()->first());
        $this->assertInstanceOf(Country::class, $admin->getCountries()->first());
        $this->assertInstanceOf(NotificationType::class, $admin->getNotificationTypes()->first());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param Admin $admin
     *
     * @return void
     */
    public function testIsFalse(Admin $admin): void
    {
        $this->assertNotInstanceOf(Message::class, $admin->getDocuments()->first());
        $this->assertNotInstanceOf(Message::class, $admin->getContacts()->first());
        $this->assertNotInstanceOf(Message::class, $admin->getFaqs()->first());
        $this->assertNotInstanceOf(Message::class, $admin->getEventCategories()->first());
        $this->assertNotInstanceOf(Admin::class, $admin->getCompanies()->first());
        $this->assertNotInstanceOf(Message::class, $admin->getCompanyCategories()->first());
        $this->assertNotInstanceOf(Message::class, $admin->getAdverts()->first());
        $this->assertNotInstanceOf(Message::class, $admin->getAdvertCategories()->first());
        $this->assertNotInstanceOf(Message::class, $admin->getAdvertTypes()->first());
        $this->assertNotInstanceOf(Message::class, $admin->getCities()->first());
        $this->assertNotInstanceOf(Message::class, $admin->getCountries()->first());
        $this->assertNotInstanceOf(Message::class, $admin->getNotificationTypes()->first());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param Admin $admin
     *
     * @return void
     */
    public function testIsEmpty(Admin $admin): void
    {
        $this->assertEmpty($admin->getNotificationTypes());
        $this->assertEmpty($admin->getCountries());
        $this->assertEmpty($admin->getCompanies());
        $this->assertEmpty($admin->getCities());
        $this->assertEmpty($admin->getAdvertTypes());
        $this->assertEmpty($admin->getAdvertCategories());
        $this->assertEmpty($admin->getAdverts());
        $this->assertEmpty($admin->getEventCategories());
        $this->assertEmpty($admin->getFaqs());
        $this->assertEmpty($admin->getContacts());
        $this->assertEmpty($admin->getDocuments());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $admins = [];
        for ($i = 0; $i < 5; ++$i) {
            $admin = new Admin();
            $admin->addContact(new Contact())
                ->addDocument(new Document())
                ->addFaq(new Faq())
                ->addEventCategory(new EventCategory())
                ->addCompany(new Company())
                ->addCompanyCategory(new CompanyCategory())
                ->addAdvert(new Advert())
                ->addAdvertCategory(new AdvertCategory())
                ->addAdvertType(new AdvertType())
                ->addCity(new City())
                ->addCountry(new Country())
                ->addNotificationType(new NotificationType());
            $admins[] = [$admin];
        }

        return $admins;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $admins = [];
        for ($i = 0; $i < 5; ++$i) {
            $admin = new Admin();
            $admins[] = [$admin];
        }

        return $admins;
    }
}