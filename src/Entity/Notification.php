<?php /** @noinspection PhpPropertyOnlyWrittenInspection */

/*
 * This file describes the notification resource.
 */
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NotificationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @access public
 *
 * @version 0.1
 */
#[ORM\Entity(repositoryClass: NotificationRepository::class)]
#[ApiResource]
class Notification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}
