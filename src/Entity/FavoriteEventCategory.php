<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FavoriteEventCategoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * ManyToMany between Event and Taxonomy
 */
#[ORM\Entity(repositoryClass: FavoriteEventCategoryRepository::class)]
#[ORM\Table(name: 'favorite_event_categories')]
#[ApiResource]
class FavoriteEventCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: EventCategory::class, inversedBy: 'favoriteEventCategories')]
    private $eventCategory;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'favoriteEventCategories')]
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
     * @return EventCategory|null
     */
    public function getEventCategory(): ?EventCategory
    {
        return $this->eventCategory;
    }

    /**
     * @param EventCategory|null $eventCategory
     *
     * @return $this
     */
    public function setEventCategory(?EventCategory $eventCategory): self
    {
        $this->eventCategory = $eventCategory;

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
}
