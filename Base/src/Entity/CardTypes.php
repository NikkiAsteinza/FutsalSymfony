<?php

namespace App\Entity;

use App\Repository\CardTypesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CardTypesRepository::class)]
class CardTypes
{
    #[ORM\Id]
    #[ORM\Column(length: 10)]
    private ?string $name = null;

    public function __construct($cardName){
        $this->name = $cardName;
    }

    public function getName(){
        return $this->name;
    }
}
