<?php /** @noinspection PhpPropertyOnlyWrittenInspection */

/*
 * This file describes the notification resource.
 */
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NotificationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @access public
 *
 * @version 0.1
 */
#[ORM\Entity(repositoryClass: NotificationRepository::class)]
#[ORM\Table(name: '`notifications`')]
#[ApiResource]
class Notification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\ManyToOne(targetEntity: NotificationType::class, inversedBy: 'notifications')]
    private $type;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'notifications')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?NotificationType
    {
        return $this->type;
    }

    public function setType(?NotificationType $type): self
    {
        $this->type = $type;

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
