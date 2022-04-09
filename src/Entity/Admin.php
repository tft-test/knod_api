<?php /** @noinspection PhpPropertyOnlyWrittenInspection */

/*
 * This file describes the Admin resource.
 */
namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @access public
 *
 * @version 0.1
 */
#[ORM\Entity(repositoryClass: AdminRepository::class)]
class Admin
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
