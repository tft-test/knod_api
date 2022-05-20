<?php /** @noinspection PhpPropertyOnlyWrittenInspection */

/*
 * This file describes the document resource.
 */
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DocumentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @access public
 *
 * @version 0.1
 */
#[ORM\Entity(repositoryClass: DocumentRepository::class)]
#[ORM\Table(name: '`documents`')]
#[ApiResource]
class Document
{
    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $filename = '';

    #[ORM\OneToOne(inversedBy: 'document', targetEntity: User::class, cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\ManyToOne(targetEntity: DocumentType::class, inversedBy: 'documents')]
    private ?DocumentType $type = null;

    #[ORM\ManyToOne(targetEntity: Admin::class, inversedBy: 'documents')]
    private ?Admin $validator = null;

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
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     *
     * @return $this
     */
    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     *
     * @return $this
     */
    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return DocumentType|null
     */
    public function getType(): ?DocumentType
    {
        return $this->type;
    }

    /**
     * @param DocumentType|null $type
     *
     * @return $this
     */
    public function setType(?DocumentType $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Admin|null
     */
    public function getValidator(): ? Admin
    {
        return $this->validator;
    }

    /**
     * @param Admin|null $validator
     *
     * @return $this
     */
    public function setValidator(?Admin $validator): self
    {
        $this->validator = $validator;

        return $this;
    }
}
