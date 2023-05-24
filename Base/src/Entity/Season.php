<?php

namespace App\Entity;

use App\Repository\SeasonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeasonRepository::class)]
class Season
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\Column]
    private ?int $startYear = null;

    #[ORM\Column]
    private ?int $endYear = null;

    #[ORM\Column(length: 9)]
    private ?string $name = null;

    public function __construct(string $startYear, string $endYear)
    {
        $this->startYear = $startYear;
        $this->endYear = $endYear;
        $this->name = $startYear."-".$endYear;
    }

    public function getId(): ?string
    {
        return $this->id;
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
