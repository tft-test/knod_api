<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventTaxonomyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * ManyToMany between Event and Taxonomy
 */
#[ORM\Entity(repositoryClass: EventTaxonomyRepository::class)]
#[ORM\Table(name: '`event_taxonomies`')]
#[ApiResource]
class EventTaxonomy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Taxonomy::class, inversedBy: 'eventTaxonomies')]
    #[ORM\JoinColumn(nullable: false)]
    private $taxonomy;

    #[ORM\ManyToOne(targetEntity: Event::class, inversedBy: 'eventTaxonomies')]
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
     * @return Taxonomy|null
     */
    public function getTaxonomy(): ?Taxonomy
    {
        return $this->taxonomy;
    }

    /**
     * @param Taxonomy|null $taxonomy
     *
     * @return $this
     */
    public function setTaxonomy(?Taxonomy $taxonomy): self
    {
        $this->taxonomy = $taxonomy;

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
