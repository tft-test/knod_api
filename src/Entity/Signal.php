<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SignalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * User's signal
 */
#[ORM\Entity(repositoryClass: SignalRepository::class)]
#[ORM\Table(name: '`signals`')]
#[ApiResource]
class Signal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $status;

    #[ORM\Column(type: 'string', length: 255)]
    private $reason;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'signals')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int $status
     *
     * @return $this
     */
    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     *
     * @return $this
     */
    public function setReason(string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
