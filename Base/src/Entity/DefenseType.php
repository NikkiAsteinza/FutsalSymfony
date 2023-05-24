<?php

namespace App\Entity;

use App\Repository\DefenseTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DefenseTypeRepository::class)]
class DefenseType
{
    #[ORM\Id]
    #[ORM\Column(length: 20)]
    private ?string $name = null;

    public function __construct($defenseTypeName)
    {
        $this->name = $defenseTypeName;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

}
