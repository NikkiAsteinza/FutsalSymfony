<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 10)]
    private ?string $type = "club";

    #[ORM\Column]
    private ?bool $isUnderAge = false;

    #[ORM\Column]
    private ?bool $hasDisplayWrights = false;

    #[ORM\Column]
    private ?bool $hasAcceptedTerms = false;

    #[ORM\ManyToOne(inversedBy: 'owner')]
    private ?Club $club = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function isIsUnderAge(): ?bool
    {
        return $this->isUnderAge;
    }

    public function setIsUnderAge(bool $isUnderAge): self
    {
        $this->isUnderAge = $isUnderAge;

        return $this;
    }

    public function isHasDisplayWrights(): ?bool
    {
        return $this->hasDisplayWrights;
    }

    public function setHasDisplayWrights(bool $hasDisplayWrights): self
    {
        $this->hasDisplayWrights = $hasDisplayWrights;

        return $this;
    }

    public function isHasAcceptedTerms(): ?bool
    {
        return $this->hasAcceptedTerms;
    }

    public function setHasAcceptedTerms(bool $hasAcceptedTerms): self
    {
        $this->hasAcceptedTerms = $hasAcceptedTerms;

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

        return $this;
    }
}
