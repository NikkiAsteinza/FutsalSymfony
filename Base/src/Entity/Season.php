<?php

namespace App\Entity;

use App\Repository\SeasonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeasonRepository::class)]
class Season
{
    #[ORM\Id]
    #[ORM\Column(length: 9)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $startYear = null;

    #[ORM\Column]
    private ?int $endYear = null;

    public function __construct($start, $end){
        $this->startYear = $start;
        $this->endYear = $end;
        $this->name = $start."-".$end;
    }

    public function getStartYear(): ?int
    {
        return $this->startYear;
    }

    public function getEndYear(): ?int
    {
        return $this->endYear;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
