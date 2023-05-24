<?php

namespace App\Entity;

use App\Repository\PassesTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PassesTypeRepository::class)]
class PassesType
{
    #[ORM\Id]
    #[ORM\Column(length: 20)]
    private ?string $name = null;

    public function __construct(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
