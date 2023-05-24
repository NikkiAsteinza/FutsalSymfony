<?php

namespace App\Entity;

use App\Repository\GendersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GendersRepository::class)]
class Genders
{
    #[ORM\Id]
    #[ORM\Column(length: 10)]
    private ?string $name = null;

    public function __construct($genderName){
        $this->name = $genderName;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
