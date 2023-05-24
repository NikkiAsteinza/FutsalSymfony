<?php

namespace App\Entity;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CompetitionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetitionRepository::class)]
class Competition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    #[Route("insert/competition")]
    public function insertCardType()
    {

        $liga = new CardTypes();
        $liga->setName("Amarilla");

        $redCard = new CardTypes();
        $redCard->setName("Red");
    }
}
