<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Club
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 9)]
    private ?string $cif = null;

    #[ORM\Column(length: 30)]
    private ?string $name = null;

    #[ORM\Column(length: 9)]
    private ?string $phone = null;

    #[ORM\Column]
    private ?bool $isVerified = false;

    #[ORM\Column]
    private ?bool $isVoiceVerifies = false;

    #[ORM\Column(type: Types::BINARY, nullable: true)]
    private $verificationDocument = null;

    #[ORM\Column(type: Types::BINARY, nullable: true)]
    private $emblem = null;

    #[ORM\OneToMany(mappedBy: 'club', targetEntity: User::class)]
    private Collection $owner;

    public function __construct(string $cif, string $name, string $email, $phone)
    {
        $this->cif = $cif;
        $this->name = $name;
        $this->phone = $phone;
        $this->owner = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

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

    /**
     * @return Collection<int, User>
     */
    public function getOwner(): Collection
    {
        return $this->owner;
    }

    public function addOwner(User $owner): self
    {
        if (!$this->owner->contains($owner)) {
            $this->owner->add($owner);
            $owner->setClub($this);
        }

        return $this;
    }

    public function removeOwner(User $owner): self
    {
        if ($this->owner->removeElement($owner)) {
            // set the owning side to null (unless already changed)
            if ($owner->getClub() === $this) {
                $owner->setClub(null);
            }
        }

        return $this;
    }
}
