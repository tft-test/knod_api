<?php /** @noinspection PhpPropertyOnlyWrittenInspection */

/*
 * This file describes the Faq resource.
 */
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FaqRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @access public
 *
 * @version 0.1
 */
#[ORM\Entity(repositoryClass: FaqRepository::class)]
#[ORM\Table(name: '`faqs`')]
#[ApiResource]
class Faq
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'text')]
    private ?string $question = '';

    #[ORM\Column(type: 'text')]
    private ?string $answer = '';

    #[ORM\Column(type: 'boolean')]
    private ?bool $status = false;

    #[ORM\ManyToOne(targetEntity: Admin::class, inversedBy: 'faqs')]
    private $author;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getQuestion(): ?string
    {
        return $this->question;
    }

    /**
     * @param string $question
     *
     * @return $this
     */
    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAnswer(): string|null
    {
        return $this->answer;
    }

    /**
     * @param string $answer
     *
     * @return $this
     */
    public function setAnswer(string $answer): self
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getStatus(): ?bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     *
     * @return $this
     */
    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Admin|null
     */
    public function getAuthor(): ?Admin
    {
        return $this->author;
    }

    /**
     * @param Admin|null $author
     *
     * @return $this
     */
    public function setAuthor(?Admin $author): self
    {
        $this->author = $author;

        return $this;
    }
}
