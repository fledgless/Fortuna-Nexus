<?php

namespace App\Entity;

use App\Repository\CharacterEidolonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterEidolonRepository::class)]
class CharacterEidolon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $number = null;

    #[ORM\ManyToOne(inversedBy: 'eidolons')]
    private ?CharacterKit $characterKit = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pullWorth = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $recommendation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $filename = null;

    /**
     * @var Collection<int, CharacterSkill>
     */
    #[ORM\OneToMany(targetEntity: CharacterSkill::class, mappedBy: 'characterEidolon')]
    private Collection $enhancedSkills;

    /**
     * @var Collection<int, MemospriteSkill>
     */
    #[ORM\OneToMany(targetEntity: MemospriteSkill::class, mappedBy: 'characterEidolon')]
    private Collection $enhancedMemoSkills;

    public function __construct()
    {
        $this->enhancedSkills = new ArrayCollection();
        $this->enhancedMemoSkills = new ArrayCollection();
    }

    public function __toString()
    {
        $name = $this->characterKit + " - Eidolon " + $this->number + " - " + $this->name;
        return $name;
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

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getCharacterKit(): ?CharacterKit
    {
        return $this->characterKit;
    }

    public function setCharacterKit(?CharacterKit $characterKit): static
    {
        $this->characterKit = $characterKit;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPullWorth(): ?string
    {
        return $this->pullWorth;
    }

    public function setPullWorth(?string $pullWorth): static
    {
        $this->pullWorth = $pullWorth;

        return $this;
    }

    public function getRecommendation(): ?string
    {
        return $this->recommendation;
    }

    public function setRecommendation(?string $recommendation): static
    {
        $this->recommendation = $recommendation;

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): static
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * @return Collection<int, CharacterSkill>
     */
    public function getEnhancedSkills(): Collection
    {
        return $this->enhancedSkills;
    }

    public function addEnhancedSkill(CharacterSkill $enhancedSkill): static
    {
        if (!$this->enhancedSkills->contains($enhancedSkill)) {
            $this->enhancedSkills->add($enhancedSkill);
            $enhancedSkill->setCharacterEidolon($this);
        }

        return $this;
    }

    public function removeEnhancedSkill(CharacterSkill $enhancedSkill): static
    {
        if ($this->enhancedSkills->removeElement($enhancedSkill)) {
            // set the owning side to null (unless already changed)
            if ($enhancedSkill->getCharacterEidolon() === $this) {
                $enhancedSkill->setCharacterEidolon(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MemospriteSkill>
     */
    public function getEnhancedMemoSkills(): Collection
    {
        return $this->enhancedMemoSkills;
    }

    public function addEnhancedMemoSkill(MemospriteSkill $enhancedMemoSkill): static
    {
        if (!$this->enhancedMemoSkills->contains($enhancedMemoSkill)) {
            $this->enhancedMemoSkills->add($enhancedMemoSkill);
            $enhancedMemoSkill->setCharacterEidolon($this);
        }

        return $this;
    }

    public function removeEnhancedMemoSkill(MemospriteSkill $enhancedMemoSkill): static
    {
        if ($this->enhancedMemoSkills->removeElement($enhancedMemoSkill)) {
            // set the owning side to null (unless already changed)
            if ($enhancedMemoSkill->getCharacterEidolon() === $this) {
                $enhancedMemoSkill->setCharacterEidolon(null);
            }
        }

        return $this;
    }
}
