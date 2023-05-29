<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Club
{
    #[ORM\Id]
    #[ORM\Column(length: 9)]
    private ?string $cif = null;

    #[ORM\Column(length: 30)]
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $isVerified = false;

    #[ORM\Column]
    private ?bool $isVoiceVerifies = false;

    #[ORM\Column(type: Types::BINARY, nullable: true)]
    private $verificationDocument = null;

    #[ORM\Column(type: Types::BINARY, nullable: true)]
    private $emblem = null;

    #[ORM\OneToOne(inversedBy: 'Club', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $owner = null;

    public function __construct(string $cif, string $name)
    {
        $this->cif = $cif;
        $this->name = $name;
    }

    public function getCif(): ?string
    {
        return $this->cif;
    }

    public function setCif(string $cif): self
    {
        $this->cif = $cif;

        return $this;
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

    public function isIsVerified(): ?bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function isIsVoiceVerifies(): ?bool
    {
        return $this->isVoiceVerifies;
    }

    public function setIsVoiceVerifies(bool $isVoiceVerifies): self
    {
        $this->isVoiceVerifies = $isVoiceVerifies;

        return $this;
    }

    public function getVerificationDocument()
    {
        return $this->verificationDocument;
    }

    public function setVerificationDocument($verificationDocument): self
    {
        $this->verificationDocument = $verificationDocument;

        return $this;
    }

    public function getEmblem()
    {
        return $this->emblem;
    }

    public function setEmblem($emblem): self
    {
        $this->emblem = $emblem;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

}
