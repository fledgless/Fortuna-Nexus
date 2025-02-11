<?php

namespace App\Entity;

use App\Repository\CharacterSkillRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterSkillRepository::class)]
class CharacterSkill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $tag = null;

    #[ORM\Column(nullable: true)]
    private ?int $energyGain = null;

    #[ORM\Column(nullable: true)]
    private ?int $energyCost = null;

    #[ORM\Column(nullable: true)]
    private ?int $breakMainTarget = null;

    #[ORM\Column(nullable: true)]
    private ?int $breakAdjacentTargets = null;

    #[ORM\Column]
    private ?bool $enhanced = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelOne = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelTwo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelThree = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelFour = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelFive = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelSix = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelSeven = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelEight = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelNine = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelTen = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelEleven = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descLevelTwelve = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $filename = null;

    #[ORM\ManyToOne(inversedBy: 'skills')]
    private ?CharacterKit $characterKit = null;

    #[ORM\ManyToOne(inversedBy: 'enhancedSkills')]
    private ?CharacterEidolon $characterEidolon = null;

    public function __toString()
    {
        $name = $this->characterKit + " - Skill - " + $this->name;
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(string $tag): static
    {
        $this->tag = $tag;

        return $this;
    }

    public function getEnergyGain(): ?int
    {
        return $this->energyGain;
    }

    public function setEnergyGain(?int $energyGain): static
    {
        $this->energyGain = $energyGain;

        return $this;
    }

    public function getEnergyCost(): ?int
    {
        return $this->energyCost;
    }

    public function setEnergyCost(?int $energyCost): static
    {
        $this->energyCost = $energyCost;

        return $this;
    }

    public function getBreakMainTarget(): ?int
    {
        return $this->breakMainTarget;
    }

    public function setBreakMainTarget(?int $breakMainTarget): static
    {
        $this->breakMainTarget = $breakMainTarget;

        return $this;
    }

    public function getBreakAdjacentTargets(): ?int
    {
        return $this->breakAdjacentTargets;
    }

    public function setBreakAdjacentTargets(?int $breakAdjacentTargets): static
    {
        $this->breakAdjacentTargets = $breakAdjacentTargets;

        return $this;
    }

    public function isEnhanced(): ?bool
    {
        return $this->enhanced;
    }

    public function setEnhanced(bool $enhanced): static
    {
        $this->enhanced = $enhanced;

        return $this;
    }

    public function getDescLevelOne(): ?string
    {
        return $this->descLevelOne;
    }

    public function setDescLevelOne(?string $descLevelOne): static
    {
        $this->descLevelOne = $descLevelOne;

        return $this;
    }

    public function getDescLevelTwo(): ?string
    {
        return $this->descLevelTwo;
    }

    public function setDescLevelTwo(?string $descLevelTwo): static
    {
        $this->descLevelTwo = $descLevelTwo;

        return $this;
    }

    public function getDescLevelThree(): ?string
    {
        return $this->descLevelThree;
    }

    public function setDescLevelThree(?string $descLevelThree): static
    {
        $this->descLevelThree = $descLevelThree;

        return $this;
    }

    public function getDescLevelFour(): ?string
    {
        return $this->descLevelFour;
    }

    public function setDescLevelFour(?string $descLevelFour): static
    {
        $this->descLevelFour = $descLevelFour;

        return $this;
    }

    public function getDescLevelFive(): ?string
    {
        return $this->descLevelFive;
    }

    public function setDescLevelFive(?string $descLevelFive): static
    {
        $this->descLevelFive = $descLevelFive;

        return $this;
    }

    public function getDescLevelSix(): ?string
    {
        return $this->descLevelSix;
    }

    public function setDescLevelSix(?string $descLevelSix): static
    {
        $this->descLevelSix = $descLevelSix;

        return $this;
    }

    public function getDescLevelSeven(): ?string
    {
        return $this->descLevelSeven;
    }

    public function setDescLevelSeven(?string $descLevelSeven): static
    {
        $this->descLevelSeven = $descLevelSeven;

        return $this;
    }

    public function getDescLevelEight(): ?string
    {
        return $this->descLevelEight;
    }

    public function setDescLevelEight(?string $descLevelEight): static
    {
        $this->descLevelEight = $descLevelEight;

        return $this;
    }

    public function getDescLevelNine(): ?string
    {
        return $this->descLevelNine;
    }

    public function setDescLevelNine(?string $descLevelNine): static
    {
        $this->descLevelNine = $descLevelNine;

        return $this;
    }

    public function getDescLevelTen(): ?string
    {
        return $this->descLevelTen;
    }

    public function setDescLevelTen(?string $descLevelTen): static
    {
        $this->descLevelTen = $descLevelTen;

        return $this;
    }

    public function getDescLevelEleven(): ?string
    {
        return $this->descLevelEleven;
    }

    public function setDescLevelEleven(?string $descLevelEleven): static
    {
        $this->descLevelEleven = $descLevelEleven;

        return $this;
    }

    public function getDescLevelTwelve(): ?string
    {
        return $this->descLevelTwelve;
    }

    public function setDescLevelTwelve(?string $descLevelTwelve): static
    {
        $this->descLevelTwelve = $descLevelTwelve;

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

    public function getCharacterKit(): ?CharacterKit
    {
        return $this->characterKit;
    }

    public function setCharacterKit(?CharacterKit $characterKit): static
    {
        $this->characterKit = $characterKit;

        return $this;
    }

    public function getCharacterEidolon(): ?CharacterEidolon
    {
        return $this->characterEidolon;
    }

    public function setCharacterEidolon(?CharacterEidolon $characterEidolon): static
    {
        $this->characterEidolon = $characterEidolon;

        return $this;
    }
}
