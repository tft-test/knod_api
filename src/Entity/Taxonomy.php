<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TaxonomyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Taxonomy
 */
#[ORM\Entity(repositoryClass: TaxonomyRepository::class)]
#[ORM\Table(name: '`taxonomies`')]
#[ApiResource]
class Taxonomy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 150)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'taxonomy', targetEntity: AdvertTaxonomy::class, orphanRemoval: true)]
    private $advertTaxonomies;

    #[ORM\OneToMany(mappedBy: 'taxonomy', targetEntity: EventTaxonomy::class, orphanRemoval: true)]
    private $eventTaxonomies;

    public function __construct()
    {
        $this->advertTaxonomies = new ArrayCollection();
        $this->eventTaxonomies = new ArrayCollection();
    }

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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, AdvertTaxonomy>
     */
    public function getAdvertTaxonomies(): Collection
    {
        return $this->advertTaxonomies;
    }

    public function addAdvertTaxonomy(AdvertTaxonomy $advertTaxonomy): self
    {
        if (!$this->advertTaxonomies->contains($advertTaxonomy)) {
            $this->advertTaxonomies[] = $advertTaxonomy;
            $advertTaxonomy->setTaxonomy($this);
        }

        return $this;
    }

    public function removeAdvertTaxonomy(AdvertTaxonomy $advertTaxonomy): self
    {
        if ($this->advertTaxonomies->removeElement($advertTaxonomy)) {
            // set the owning side to null (unless already changed)
            if ($advertTaxonomy->getTaxonomy() === $this) {
                $advertTaxonomy->setTaxonomy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EventTaxonomy>
     */
    public function getEventTaxonomies(): Collection
    {
        return $this->eventTaxonomies;
    }

    public function addEventTaxonomy(EventTaxonomy $eventTaxonomy): self
    {
        if (!$this->eventTaxonomies->contains($eventTaxonomy)) {
            $this->eventTaxonomies[] = $eventTaxonomy;
            $eventTaxonomy->setTaxonomy($this);
        }

        return $this;
    }

    public function removeEventTaxonomy(EventTaxonomy $eventTaxonomy): self
    {
        if ($this->eventTaxonomies->removeElement($eventTaxonomy)) {
            // set the owning side to null (unless already changed)
            if ($eventTaxonomy->getTaxonomy() === $this) {
                $eventTaxonomy->setTaxonomy(null);
            }
        }

        return $this;
    }
}
