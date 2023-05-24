<?php

namespace App\Entity;

use App\Repository\UserTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserTypeRepository::class)]
class UserType
{
    #[ORM\Id]
    #[ORM\Column(length: 10)]
    private ?string $name = null;

    public function __construct(string $typeName)
    {
        $this->name = $typeName;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
