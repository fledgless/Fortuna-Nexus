<?php

namespace App\Entity;

use App\Repository\TeammateRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeammateRepository::class)]
class Teammate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'teammates')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CharacterBuild $characterName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $teammate = null;

    #[ORM\Column]
    private ?int $priority = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacterName(): ?CharacterBuild
    {
        return $this->characterName;
    }

    public function setCharacterName(?CharacterBuild $characterName): static
    {
        $this->characterName = $characterName;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getTeammate(): ?Character
    {
        return $this->teammate;
    }

    public function setTeammate(?Character $teammate): static
    {
        $this->teammate = $teammate;

        return $this;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): static
    {
        $this->priority = $priority;

        return $this;
    }
}
