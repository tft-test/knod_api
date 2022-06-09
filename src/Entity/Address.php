<?php
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AddressRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Address
 */
#[ORM\Entity(repositoryClass: AddressRepository::class)]
#[ORM\Table(name: '`addresses`')]
#[ApiResource]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;


    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank]
    #[Assert\Type("integer")]
    private $number;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $street;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'addresses')]
    private $user;

    #[ORM\OneToMany(mappedBy: 'address', targetEntity: Event::class)]
    private $events;

    #[ORM\ManyToOne(targetEntity: Company::class, inversedBy: 'addresses')]
    private $company;

    #[ORM\ManyToOne(targetEntity: City::class, inversedBy: 'addresses')]
    #[ORM\JoinColumn(nullable: false)]
    private $city;

    public function __construct()
    {
        $this->events = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @param int $number
     *
     * @return $this
     */
    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string $street
     *
     * @return $this
     */
    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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
            $event->setAddress($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getAddress() === $this) {
                $event->setAddress(null);
            }
        }

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }
}
