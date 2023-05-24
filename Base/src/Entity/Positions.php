<?php

namespace App\Entity;

use App\Repository\PositionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PositionsRepository::class)]
class Positions
{
    #[ORM\Id]
    #[ORM\Column(length: 20)]
    private ?string $name = null;

    public function __construct($positionTypeName){
        $this->name = $positionTypeName;
    }

    public function getName(){
        return $this->name;
    }
}
