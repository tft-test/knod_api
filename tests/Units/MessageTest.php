<?php

namespace App\Tests\Units;

use App\Entity\Admin;
use App\Entity\Message;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Message Test class
 */
class MessageTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param Message $message
     *
     * @return void
     */
    public function testIsTrue(Message $message): void
    {
        $this->assertEquals('title', $message->getTitle());
        $this->assertEquals('url', $message->getUrl());
        $this->assertEquals('message', $message->getMessage());
        $this->assertInstanceOf(User::class, $message->getSender());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param Message $message
     *
     * @return void
     */
    public function testIsFalse(Message $message): void
    {
        $this->assertNotEquals('url', $message->getTitle());
        $this->assertNotEquals('title', $message->getUrl());
        $this->assertNotEquals('answer', $message->getMessage());
        $this->assertNotInstanceOf(Admin::class, $message->getSender());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param Message $message
     *
     * @return void
     */
    public function testIsEmpty(Message $message): void
    {
        $this->assertEmpty($message->getMessage());
        $this->assertEmpty($message->getSender());
        $this->assertEmpty($message->getTitle());
        $this->assertEmpty($message->getUrl());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $messages = [];
        for ($i = 0; $i < 5; ++$i) {
            $message = new Message();
            $message->setMessage('message')
                ->setSender(new User())
                ->setTitle('title')
                ->setUrl('url');
            $messages[] = [$message];
        }

        return $messages;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $messages = [];
        for ($i = 0; $i < 5; ++$i) {
            $message = new Message();
            $messages[] = [$message];
        }
        return $messages;
    }
}