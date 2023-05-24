<?php

namespace App\Entity;

use App\Repository\GoalTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GoalTypeRepository::class)]
class GoalType
{
    #[ORM\Id]
    #[ORM\Column(length: 20)]
    private ?string $name = null;

    public function __construct(string $goalTypeName){
        $this->name = $goalTypeName;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
