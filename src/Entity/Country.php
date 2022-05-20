<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 */
#[ORM\Entity(repositoryClass: CountryRepository::class)]
#[ORM\Table(name: '`countries`')]
#[ApiResource]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 10)]
    private $indicative;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $flagFilename;

    #[ORM\OneToMany(mappedBy: 'country', targetEntity: City::class, orphanRemoval: true)]
    private $cities;

    #[ORM\ManyToOne(targetEntity: Admin::class, inversedBy: 'countries')]
    private $author;

    public function __construct()
    {
        $this->cities = new ArrayCollection();
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
     * @return string|null
     */
    public function getIndicative(): ?string
    {
        return $this->indicative;
    }

    /**
     * @param string $indicative
     *
     * @return $this
     */
    public function setIndicative(string $indicative): self
    {
        $this->indicative = $indicative;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFlagFilename(): ?string
    {
        return $this->flagFilename;
    }

    /**
     * @param string|null $flagFilename
     *
     * @return $this
     */
    public function setFlagFilename(?string $flagFilename): self
    {
        $this->flagFilename = $flagFilename;

        return $this;
    }

    /**
     * @return Collection<int, City>
     */
    public function getCities(): Collection
    {
        return $this->cities;
    }

    public function addCity(City $city): self
    {
        if (!$this->cities->contains($city)) {
            $this->cities[] = $city;
            $city->setCountry($this);
        }

        return $this;
    }

    public function removeCity(City $city): self
    {
        if ($this->cities->removeElement($city)) {
            // set the owning side to null (unless already changed)
            if ($city->getCountry() === $this) {
                $city->setCountry(null);
            }
        }

        return $this;
    }

    public function getAuthor(): ?Admin
    {
        return $this->author;
    }

    public function setAuthor(?Admin $author): self
    {
        $this->author = $author;

        return $this;
    }
}
