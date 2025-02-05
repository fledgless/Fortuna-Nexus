<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $elementalDebuff = null;

    #[ORM\Column(nullable: true)]
    private ?int $breakMultiplier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $typeFilename = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $debuffFilename = null;

    /**
     * @var Collection<int, Character>
     */
    #[ORM\OneToMany(targetEntity: Character::class, mappedBy: 'type')]
    private Collection $characters;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getElementalDebuff(): ?string
    {
        return $this->elementalDebuff;
    }

    public function setElementalDebuff(?string $elementalDebuff): static
    {
        $this->elementalDebuff = $elementalDebuff;

        return $this;
    }

    public function getBreakMultiplier(): ?int
    {
        return $this->breakMultiplier;
    }

    public function setBreakMultiplier(?int $breakMultiplier): static
    {
        $this->breakMultiplier = $breakMultiplier;

        return $this;
    }

    public function getTypeFilename(): ?string
    {
        return $this->typeFilename;
    }

    public function setTypeFilename(?string $typeFilename): static
    {
        $this->typeFilename = $typeFilename;

        return $this;
    }

    public function getDebuffFilename(): ?string
    {
        return $this->debuffFilename;
    }

    public function setDebuffFilename(?string $debuffFilename): static
    {
        $this->debuffFilename = $debuffFilename;

        return $this;
    }

    /**
     * @return Collection<int, Character>
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): static
    {
        if (!$this->characters->contains($character)) {
            $this->characters->add($character);
            $character->setType($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): static
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getType() === $this) {
                $character->setType(null);
            }
        }

        return $this;
    }
}
