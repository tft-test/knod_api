<?php /* @noinspection PhpPropertyOnlyWrittenInspection */

/*
 * This file describes to the Advert resource
 */
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdvertRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @access public
 *
 * @version 0.1
 */
#[ORM\Entity(repositoryClass: AdvertRepository::class)]
#[ORM\Table(name: '`adverts`')]
#[ApiResource]
class Advert
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private ?string $title = '';

    #[ORM\ManyToOne(targetEntity: Admin::class, inversedBy: 'adverts')]
    private $author;

    #[ORM\ManyToOne(targetEntity: AdvertType::class, inversedBy: 'adverts')]
    #[ORM\JoinColumn(nullable: false)]
    private $type;

    #[ORM\OneToMany(mappedBy: 'advert', targetEntity: AdvertTaxonomy::class, orphanRemoval: true)]
    private $advertTaxonomies;

    public function __construct()
    {
        $this->advertTaxonomies = new ArrayCollection();
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
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getType(): ?AdvertType
    {
        return $this->type;
    }

    public function setType(?AdvertType $type): self
    {
        $this->type = $type;

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
            $advertTaxonomy->setAdvert($this);
        }

        return $this;
    }

    public function removeAdvertTaxonomy(AdvertTaxonomy $advertTaxonomy): self
    {
        if ($this->advertTaxonomies->removeElement($advertTaxonomy)) {
            // set the owning side to null (unless already changed)
            if ($advertTaxonomy->getAdvert() === $this) {
                $advertTaxonomy->setAdvert(null);
            }
        }

        return $this;
    }
}
