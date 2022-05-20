<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdvertTaxonomyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Relationship between Event and Taxonomy
 */
#[ORM\Entity(repositoryClass: AdvertTaxonomyRepository::class)]
#[ORM\Table(name: '`advert_taxonomies`')]
#[ApiResource]
class AdvertTaxonomy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Taxonomy::class, inversedBy: 'advertTaxonomies')]
    #[ORM\JoinColumn(nullable: false)]
    private $taxonomy;

    #[ORM\ManyToOne(targetEntity: Advert::class, inversedBy: 'advertTaxonomies')]
    #[ORM\JoinColumn(nullable: false)]
    private $advert;

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
     * @return Advert|null
     */
    public function getAdvert(): ?Advert
    {
        return $this->advert;
    }

    /**
     * @param Advert|null $advert
     *
     * @return $this
     */
    public function setAdvert(?Advert $advert): self
    {
        $this->advert = $advert;

        return $this;
    }
}
