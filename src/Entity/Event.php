<?php /* @noinspection PhpPropertyOnlyWrittenInspection */

/*
 * This file describes the event resource.
 */
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @access public
 *
 * @version 0.1
 */
#[ORM\Entity(repositoryClass: EventRepository::class)]
#[ORM\Table(name: '`events`')]
#[ApiResource]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $title = '';

    #[ORM\Column(type: 'text')]
    private ?string $description = '';

    // TODO - Have to make Relationship ManyToMany for Like on Dislike Event
    #[ORM\Column(type: 'integer')]
    private ?int $nbOfLike = 0;

    #[ORM\Column(type: 'integer')]
    private ?int $nbOfDeslike;
    // ----------------------------------------------------------------------

    #[ORM\Column(type: 'integer')]
    private ?int $nbPlace = 0;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'events')]
    private $author;

    #[ORM\ManyToOne(targetEntity: Address::class, inversedBy: 'events')]
    private $address;

    #[ORM\ManyToOne(targetEntity: EventCategory::class, inversedBy: 'events')]
    private $category;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: EventEvaluation::class, orphanRemoval: true)]
    private $eventEvaluations;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: Subscriber::class, orphanRemoval: true)]
    private $subscribers;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: FavoriteEvent::class, orphanRemoval: true)]
    private $favoriteEvents;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: EventTaxonomy::class, orphanRemoval: true)]
    private $eventTaxonomies;

    public function __construct()
    {
        $this->eventEvaluations = new ArrayCollection();
        $this->subscribers = new ArrayCollection();
        $this->favoriteEvents = new ArrayCollection();
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

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNbOfLike(): ?int
    {
        return $this->nbOfLike;
    }

    /**
     * @param int $nbOfLike
     *
     * @return $this
     */
    public function setNbOfLike(int $nbOfLike): self
    {
        $this->nbOfLike = $nbOfLike;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNbOfDeslike(): ?int
    {
        return $this->nbOfDeslike;
    }

    /**
     * @param int $nbOfDeslike
     *
     * @return $this
     */
    public function setNbOfDeslike(int $nbOfDeslike): self
    {
        $this->nbOfDeslike = $nbOfDeslike;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNbPlace(): ?int
    {
        return $this->nbPlace;
    }

    /**
     * @param int $nbPlace
     *
     * @return $this
     */
    public function setNbPlace(int $nbPlace): self
    {
        $this->nbPlace = $nbPlace;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCategory(): ?EventCategory
    {
        return $this->category;
    }

    public function setCategory(?EventCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, EventEvaluation>
     */
    public function getEventEvaluations(): Collection
    {
        return $this->eventEvaluations;
    }

    public function addEventEvaluation(EventEvaluation $eventEvaluation): self
    {
        if (!$this->eventEvaluations->contains($eventEvaluation)) {
            $this->eventEvaluations[] = $eventEvaluation;
            $eventEvaluation->setEvent($this);
        }

        return $this;
    }

    public function removeEventEvaluation(EventEvaluation $eventEvaluation): self
    {
        if ($this->eventEvaluations->removeElement($eventEvaluation)) {
            // set the owning side to null (unless already changed)
            if ($eventEvaluation->getEvent() === $this) {
                $eventEvaluation->setEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Subscriber>
     */
    public function getSubscribers(): Collection
    {
        return $this->subscribers;
    }

    public function addSubscriber(Subscriber $subscriber): self
    {
        if (!$this->subscribers->contains($subscriber)) {
            $this->subscribers[] = $subscriber;
            $subscriber->setEvent($this);
        }

        return $this;
    }

    public function removeSubscriber(Subscriber $subscriber): self
    {
        if ($this->subscribers->removeElement($subscriber)) {
            // set the owning side to null (unless already changed)
            if ($subscriber->getEvent() === $this) {
                $subscriber->setEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FavoriteEvent>
     */
    public function getFavoriteEvents(): Collection
    {
        return $this->favoriteEvents;
    }

    public function addFavoriteEvent(FavoriteEvent $favoriteEvent): self
    {
        if (!$this->favoriteEvents->contains($favoriteEvent)) {
            $this->favoriteEvents[] = $favoriteEvent;
            $favoriteEvent->setEvent($this);
        }

        return $this;
    }

    public function removeFavoriteEvent(FavoriteEvent $favoriteEvent): self
    {
        if ($this->favoriteEvents->removeElement($favoriteEvent)) {
            // set the owning side to null (unless already changed)
            if ($favoriteEvent->getEvent() === $this) {
                $favoriteEvent->setEvent(null);
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
            $eventTaxonomy->setEvent($this);
        }

        return $this;
    }

    public function removeEventTaxonomy(EventTaxonomy $eventTaxonomy): self
    {
        if ($this->eventTaxonomies->removeElement($eventTaxonomy)) {
            // set the owning side to null (unless already changed)
            if ($eventTaxonomy->getEvent() === $this) {
                $eventTaxonomy->setEvent(null);
            }
        }

        return $this;
    }
}
