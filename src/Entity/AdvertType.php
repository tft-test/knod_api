<?php /* @noinspection PhpPropertyOnlyWrittenInspection */

/*
 * This file describes the AdvertType resource.
 */
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdvertTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @access public
 *
 * @version 0.1
 */
#[ORM\Entity(repositoryClass: AdvertTypeRepository::class)]
#[ORM\Table(name: '`advert_types`')]
#[ApiResource]
class AdvertType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'The name is required.')]
    private ?string $type = '';

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: Advert::class, orphanRemoval: true)]
    private $adverts;

    #[ORM\ManyToOne(targetEntity: Admin::class, inversedBy: 'advertTypes')]
    private $author;

    public function __construct()
    {
        $this->adverts = new ArrayCollection();
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
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Advert>
     */
    public function getAdverts(): Collection
    {
        return $this->adverts;
    }

    public function addAdvert(Advert $advert): self
    {
        if (!$this->adverts->contains($advert)) {
            $this->adverts[] = $advert;
            $advert->setType($this);
        }

        return $this;
    }

    public function removeAdvert(Advert $advert): self
    {
        if ($this->adverts->removeElement($advert)) {
            // set the owning side to null (unless already changed)
            if ($advert->getType() === $this) {
                $advert->setType(null);
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
