<?php

namespace App\Entity;

use App\Repository\StaffTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StaffTypeRepository::class)]
class StaffType
{
    #[ORM\Id]
    #[ORM\Column(length: 50)]
    private ?string $name = null;

    public function __construct(string $staffTypeName)
    {
        $this->name = $staffTypeName;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
