<?php

namespace App\Entity;

use App\Repository\CharacterStoriesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterStoriesRepository::class)]
class CharacterStories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'stories', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $characterName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $characterDetails = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $characterStoryPartOne = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $characterStoryPartTwo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $characterStoryPartThree = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $characterStoryPartFour = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacterName(): ?Character
    {
        return $this->characterName;
    }

    public function setCharacterName(Character $characterName): static
    {
        $this->characterName = $characterName;

        return $this;
    }

    public function getCharacterDetails(): ?string
    {
        return $this->characterDetails;
    }

    public function setCharacterDetails(?string $characterDetails): static
    {
        $this->characterDetails = $characterDetails;

        return $this;
    }

    public function getCharacterStoryPartOne(): ?string
    {
        return $this->characterStoryPartOne;
    }

    public function setCharacterStoryPartOne(?string $characterStoryPartOne): static
    {
        $this->characterStoryPartOne = $characterStoryPartOne;

        return $this;
    }

    public function getCharacterStoryPartTwo(): ?string
    {
        return $this->characterStoryPartTwo;
    }

    public function setCharacterStoryPartTwo(?string $characterStoryPartTwo): static
    {
        $this->characterStoryPartTwo = $characterStoryPartTwo;

        return $this;
    }

    public function getCharacterStoryPartThree(): ?string
    {
        return $this->characterStoryPartThree;
    }

    public function setCharacterStoryPartThree(?string $characterStoryPartThree): static
    {
        $this->characterStoryPartThree = $characterStoryPartThree;

        return $this;
    }

    public function getCharacterStoryPartFour(): ?string
    {
        return $this->characterStoryPartFour;
    }

    public function setCharacterStoryPartFour(?string $characterStoryPartFour): static
    {
        $this->characterStoryPartFour = $characterStoryPartFour;

        return $this;
    }
}
