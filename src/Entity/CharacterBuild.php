<?php

namespace App\Entity;

use App\Repository\CharacterBuildRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterBuildRepository::class)]
class CharacterBuild
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $characterName = null;

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
}
