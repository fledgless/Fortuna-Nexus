<?php

namespace App\Entity;

use App\Repository\RecommendedOrnamentSetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecommendedOrnamentSetRepository::class)]
class RecommendedOrnamentSet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'recommendedOrnamentSets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CharacterBuild $characterName = null;

    #[ORM\ManyToOne(inversedBy: 'recommendedCharacters')]
    #[ORM\JoinColumn(nullable: false)]
    private ?OrnamentSet $ornamentSet = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

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

    public function getOrnamentSet(): ?OrnamentSet
    {
        return $this->ornamentSet;
    }

    public function setOrnamentSet(?OrnamentSet $ornamentSet): static
    {
        $this->ornamentSet = $ornamentSet;

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
