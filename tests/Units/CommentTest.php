<?php

namespace App\Tests\Units;

use App\Entity\Admin;
use App\Entity\Comment;
use App\Entity\City;
use App\Entity\Company;
use App\Entity\Event;
use App\Entity\CommentType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Comment Test class
 */
class CommentTest extends KernelTestCase
{
    /**
     * @dataProvider providerIsTrue
     *
     * @param Comment $comment
     *
     * @return void
     */
    public function testIsTrue(Comment $comment): void
    {
        $this->assertInstanceOf(User::class, $comment->getAuthor());
        $this->assertEquals('comment', $comment->getComment());
    }

    /**
     * @dataProvider providerIsTrue
     *
     * @param Comment $comment
     *
     * @return void
     */
    public function testIsFalse(Comment $comment): void
    {
        $this->assertNotInstanceOf(Company::class, $comment->getAuthor());
        $this->assertNotEquals('comentario', $comment->getComment());
    }

    /**
     * @dataProvider providerIsEmpty
     *
     * @param Comment $comment
     *
     * @return void
     */
    public function testIsEmpty(Comment $comment): void
    {
        $this->assertEmpty($comment->getComment());
        $this->assertEmpty($comment->getAuthor());
    }

    /**
     * @return array
     */
    public function providerIsTrue(): array
    {
        $comments = [];
        for ($i = 0; $i < 5; ++$i) {
            $comment = new Comment();
            $comment->setComment('comment')
                ->setAuthor(new User());
            $comments[] = [$comment];
        }

        return $comments;
    }

    /**
     * @return array
     */
    public function providerIsEmpty(): array
    {
        $comments = [];
        for ($i = 0; $i < 5; ++$i) {
            $comment = new Comment();
            $comments[] = [$comment];
        }

        return $comments;
    }
}
