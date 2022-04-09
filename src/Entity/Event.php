<?php /* @noinspection PhpPropertyOnlyWrittenInspection */

/*
 * This file describes the event resource.
 */
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @access public
 *
 * @version 0.1
 */
#[ORM\Entity(repositoryClass: EventRepository::class)]
#[ApiResource]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $title;

    #[ORM\Column(type: 'text')]
    private ?string $description;

    #[ORM\Column(type: 'integer')]
    private ?int $nbOfLike;

    #[ORM\Column(type: 'integer')]
    private ?int $nbOfDeslike;

    #[ORM\Column(type: 'integer')]
    private ?int $nbPlace;

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
}
