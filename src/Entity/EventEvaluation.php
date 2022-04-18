<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventEvaluationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entity for the relationship between User and Event
 */
#[ORM\Entity(repositoryClass: EventEvaluationRepository::class)]
#[ORM\Table(name: '`event_evaluations`')]
#[ApiResource]
class EventEvaluation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private int $nbStar;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'eventEvaluations')]
    private $user;

    #[ORM\ManyToOne(targetEntity: Event::class, inversedBy: 'eventEvaluations')]
    #[ORM\JoinColumn(nullable: false)]
    private $event;

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
    public function getNbStar(): ?int
    {
        return $this->nbStar;
    }

    /**
     * @param int $nbStar
     *
     * @return $this
     */
    public function setNbStar(int $nbStar): self
    {
        $this->nbStar = $nbStar;

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
     * @return Event|null
     */
    public function getEvent(): ?Event
    {
        return $this->event;
    }

    /**
     * @param Event|null $event
     *
     * @return $this
     */
    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }
}
