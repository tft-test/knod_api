<?php /* @noinspection PhpPropertyOnlyWrittenInspection */

/*
 * This file describes the eventCategory resource.
 */
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @access public
 *
 * @version 0.1
 */
#[ORM\Entity(repositoryClass: EventCategoryRepository::class)]
#[ORM\Table(name: '`event_categories`')]
#[ApiResource]
class EventCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $category = '';

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Event::class)]
    private $events;

    #[ORM\ManyToOne(targetEntity: Admin::class, inversedBy: 'eventCategories')]
    private $author;

    #[ORM\OneToMany(mappedBy: 'eventCategory', targetEntity: FavoriteEventCategory::class)]
    private $favoriteEventCategories;

    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->favoriteEventCategories = new ArrayCollection();
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
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param string $category
     *
     * @return $this
     */
    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->setCategory($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getCategory() === $this) {
                $event->setCategory(null);
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

    /**
     * @return Collection<int, FavoriteEventCategory>
     */
    public function getFavoriteEventCategories(): Collection
    {
        return $this->favoriteEventCategories;
    }

    public function addFavoriteEventCategory(FavoriteEventCategory $favoriteEventCategory): self
    {
        if (!$this->favoriteEventCategories->contains($favoriteEventCategory)) {
            $this->favoriteEventCategories[] = $favoriteEventCategory;
            $favoriteEventCategory->setEventCategory($this);
        }

        return $this;
    }

    public function removeFavoriteEventCategory(FavoriteEventCategory $favoriteEventCategory): self
    {
        if ($this->favoriteEventCategories->removeElement($favoriteEventCategory)) {
            // set the owning side to null (unless already changed)
            if ($favoriteEventCategory->getEventCategory() === $this) {
                $favoriteEventCategory->setEventCategory(null);
            }
        }

        return $this;
    }
}
