<?php /** @noinspection ALL */

/*
 * This file describes the User resource.
 */

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @access public
 *
 * @version 0.1
 */
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`users`')]
#[ORM\InheritanceType("SINGLE_TABLE")]
#[ORM\DiscriminatorColumn(name: "discr", type: "string")]
#[ORM\DiscriminatorMap(["users"=>"User", "admins"=>"Admin"])]
#[ApiResource()]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["get"])]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    #[Groups(["get", "put"])]
    #[Assert\NotBlank]
    #[Assert\Email(groups: ["registration"])]
    private ?string $email = '';

    #[ORM\Column(type: 'json')]
    #[Groups("get")]
    private ?array $roles = [];

    #[ORM\Column(type: 'string')]
    #[Groups(["put"])]
    private ?string $password = '';

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $firstname = '';

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $lastname = '';

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $username = '';

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $phoneNumber = '';

    #[ORM\Column(type: 'text')]
    private ?string $description = '';

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Notification::class, orphanRemoval: true)]
    private $notifications;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Signal::class, orphanRemoval: true)]
    private $signals;

    #[ORM\OneToOne(mappedBy: 'user', targetEntity: Document::class, cascade: ['persist', 'remove'])]
    private $document;

    #[ORM\OneToMany(mappedBy: 'sender', targetEntity: Message::class)]
    private $messages;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: Comment::class)]
    private $comments;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: Event::class)]
    private $events;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Address::class)]
    private $addresses;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: EventEvaluation::class)]
    private $eventEvaluations;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Subscriber::class, orphanRemoval: true)]
    private $subscribers;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: FavoriteEvent::class, orphanRemoval: true)]
    private $favoriteEvents;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: FavoriteEventCategory::class, orphanRemoval: true)]
    private $favoriteEventCategories;

    public function __construct()
    {
        $this->notifications = new ArrayCollection();
        $this->signals = new ArrayCollection();
        $this->messages = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->events = new ArrayCollection();
        $this->addresses = new ArrayCollection();
        $this->eventEvaluations = new ArrayCollection();
        $this->subscribers = new ArrayCollection();
        $this->favoriteEvents = new ArrayCollection();
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
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param array $roles
     *
     * @return $this
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     *
     * @return $this
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     *
     * @return $this
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @param string $username
     *
     * @return $this
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     *
     * @return $this
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

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
     * @return Collection<int, Notification>
     */
    public function getNotifications(): Collection
    {
        return $this->notifications;
    }

    public function addNotification(Notification $notification): self
    {
        if (!$this->notifications->contains($notification)) {
            $this->notifications[] = $notification;
            $notification->setUser($this);
        }

        return $this;
    }

    public function removeNotification(Notification $notification): self
    {
        if ($this->notifications->removeElement($notification)) {
            // set the owning side to null (unless already changed)
            if ($notification->getUser() === $this) {
                $notification->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Signal>
     */
    public function getSignals(): Collection
    {
        return $this->signals;
    }

    public function addSignal(Signal $signal): self
    {
        if (!$this->signals->contains($signal)) {
            $this->signals[] = $signal;
            $signal->setUser($this);
        }

        return $this;
    }

    public function removeSignal(Signal $signal): self
    {
        if ($this->signals->removeElement($signal)) {
            // set the owning side to null (unless already changed)
            if ($signal->getUser() === $this) {
                $signal->setUser(null);
            }
        }

        return $this;
    }

    public function getDocument(): ?Document
    {
        return $this->document;
    }

    public function setDocument(?Document $document): self
    {
        // unset the owning side of the relation if necessary
        if ($document === null && $this->document !== null) {
            $this->document->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($document !== null && $document->getUser() !== $this) {
            $document->setUser($this);
        }

        $this->document = $document;

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setSender($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getSender() === $this) {
                $message->setSender(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setAuthor($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getAuthor() === $this) {
                $comment->setAuthor(null);
            }
        }

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
            $event->setAuthor($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getAuthor() === $this) {
                $event->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Address>
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function addAddress(Address $address): self
    {
        if (!$this->addresses->contains($address)) {
            $this->addresses[] = $address;
            $address->setUser($this);
        }

        return $this;
    }

    public function removeAddress(Address $address): self
    {
        if ($this->addresses->removeElement($address)) {
            // set the owning side to null (unless already changed)
            if ($address->getUser() === $this) {
                $address->setUser(null);
            }
        }

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
            $eventEvaluation->setUser($this);
        }

        return $this;
    }

    public function removeEventEvaluation(EventEvaluation $eventEvaluation): self
    {
        if ($this->eventEvaluations->removeElement($eventEvaluation)) {
            // set the owning side to null (unless already changed)
            if ($eventEvaluation->getUser() === $this) {
                $eventEvaluation->setUser(null);
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
            $subscriber->setUser($this);
        }

        return $this;
    }

    public function removeSubscriber(Subscriber $subscriber): self
    {
        if ($this->subscribers->removeElement($subscriber)) {
            // set the owning side to null (unless already changed)
            if ($subscriber->getUser() === $this) {
                $subscriber->setUser(null);
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
            $favoriteEvent->setUser($this);
        }

        return $this;
    }

    public function removeFavoriteEvent(FavoriteEvent $favoriteEvent): self
    {
        if ($this->favoriteEvents->removeElement($favoriteEvent)) {
            // set the owning side to null (unless already changed)
            if ($favoriteEvent->getUser() === $this) {
                $favoriteEvent->setUser(null);
            }
        }

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
            $favoriteEventCategory->setUser($this);
        }

        return $this;
    }

    public function removeFavoriteEventCategory(FavoriteEventCategory $favoriteEventCategory): self
    {
        if ($this->favoriteEventCategories->removeElement($favoriteEventCategory)) {
            // set the owning side to null (unless already changed)
            if ($favoriteEventCategory->getUser() === $this) {
                $favoriteEventCategory->setUser(null);
            }
        }

        return $this;
    }
}
