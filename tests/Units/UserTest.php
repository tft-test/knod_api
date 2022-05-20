<?php

namespace App\Tests\Units;

use App\Entity\Address;
use App\Entity\Document;
use App\Entity\Event;
use App\Entity\Message;
use App\Entity\Notification;
use App\Entity\Signal;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * User Test class
 */
class UserTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param User $user
     *
     * @return void
     */
    public function testIsTrue(User $user): void
    {
        $this->assertEquals('email@domain.ext', $user->getEmail());
        $this->assertEquals('password', $user->getPassword());
        $this->assertEquals('description', $user->getDescription());
        $this->assertEquals('firstname', $user->getFirstname());
        $this->assertEquals('lastname', $user->getLastname());
        $this->assertEquals('0751552414', $user->getPhoneNumber());
        $this->assertInstanceOf(Address::class, $user->getAddresses()->first());
        $this->assertInstanceOf(Notification::class, $user->getNotifications()->first());
        $this->assertInstanceOf(Document::class, $user->getDocument());
        $this->assertInstanceOf(Signal::class, $user->getSignals()->first());
        $this->assertInstanceOf(Message::class, $user->getMessages()->first());
        $this->assertInstanceOf(Event::class, $user->getEvents()->first());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param User $user
     *
     * @return void
     */
    public function testIsFalse(User $user): void
    {
        $this->assertNotEquals('emailo@domain.ext', $user->getEmail());
        $this->assertNotEquals('desciption', $user->getPassword());
        $this->assertNotEquals('desciption', $user->getDescription());
        $this->assertNotEquals('desciption', $user->getFirstname());
        $this->assertNotEquals('desciption', $user->getLastname());
        $this->assertNotEquals('desciption', $user->getPhoneNumber());
        $this->assertNotInstanceOf(Message::class, $user->getAddresses()->first());
        $this->assertNotInstanceOf(Message::class, $user->getNotifications()->first());
        $this->assertNotInstanceOf(Message::class, $user->getDocument());
        $this->assertNotInstanceOf(Message::class, $user->getSignals()->first());
        $this->assertNotInstanceOf(User::class, $user->getMessages()->first());
        $this->assertNotInstanceOf(Message::class, $user->getEvents()->first());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param User $user
     *
     * @return void
     */
    public function testIsEmpty(User $user): void
    {
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getDescription());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getLastname());
        $this->assertEmpty($user->getFirstname());
        $this->assertEmpty($user->getPhoneNumber());
        $this->assertEmpty($user->getAddresses());
        $this->assertEmpty($user->getNotifications());
        $this->assertEmpty($user->getSignals());
        $this->assertEmpty($user->getDocument());
        $this->assertEmpty($user->getMessages());
        $this->assertEmpty($user->getEvents());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $users = [];
        for ($i = 0; $i < 5; ++$i) {
            $user = new User();
            $user->setEmail('email@domain.ext')
                ->setPassword('password')
                ->setFirstname('firstname')
                ->setLastname('lastname')
                ->setUsername('username')
                ->setPhoneNumber('0751552414')
                ->setDescription('description')
                ->addAddress(new Address())
                ->addNotification(new Notification())
                ->addSignal(new Signal())
                ->setDocument(new Document())
                ->addMessage(new Message())
                ->addEvent(new Event());
            $users[] = [$user];
        }

        return $users;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $users = [];
        for ($i = 0; $i < 5; ++$i) {
            $user = new User();
            $users[] = [$user];
        }

        return $users;
    }
}