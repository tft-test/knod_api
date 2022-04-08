<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CountryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIndicative(): ?string
    {
        return $this->indicative;
    }

    public function setIndicative(string $indicative): self
    {
        $this->indicative = $indicative;

        return $this;
    }

    public function getFlagFilename(): ?string
    {
        return $this->flagFilename;
    }

    public function setFlagFilename(?string $flagFilename): self
    {
        $this->flagFilename = $flagFilename;

        return $this;
    }
}
